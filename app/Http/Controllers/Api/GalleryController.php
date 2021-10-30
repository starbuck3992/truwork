<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryStoreRequest;
use App\Http\Requests\GalleryUpdateRequest;
use App\Http\Resources\AdminResources\GalleryEditResource;
use App\Http\Resources\AdminResources\GalleryListResource;
use App\Http\Resources\PublicResources\ImageResource;
use App\Http\Resources\PublicResources\GalleryIndexResource;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class GalleryController extends Controller
{

    public function list()
    {
        return GalleryListResource::collection(Gallery::with(
            ['user', 'category', 'images' => function ($query) {
                $query->where('thumbnail', 1);
            }])->orderBy('created_at', 'DESC')->get());
    }

    public function index(Request $request)
    {
        $category = $request->query('category');

        return GalleryIndexResource::collection(Gallery::with(
            ['category','images' => function ($query) {
                $query->where('thumbnail', 1);
            }])->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })->orderBy('created_at', 'DESC')->get());
    }

    public function store(GalleryStoreRequest $request)
    {

        $user = Auth::id();

        $slug = Str::slug($request->title);

        $gallery = new Gallery([
            'user_id' => $user,
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => $slug
        ]);

        $gallery->save();

        $imagesToSave = array();
        $thumbnail_file = $request->file('thumbnail');
        $imagesToSave[] = new Image([
            'user_id' => $user,
            'original_name' => $thumbnail_file->getClientOriginalName(),
            'path' => $thumbnail_file->store("images/galleries/$gallery->id", 'public'),
            'extension' => $thumbnail_file->extension(),
            'size' => $thumbnail_file->getSize(),
            'thumbnail' => true
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store("images/galleries/$gallery->id", 'public');

            $imagesToSave[] = new Image([
                'user_id' => $user,
                'original_name' => $image->getClientOriginalName(),
                'path' => $path,
                'extension' => $image->extension(),
                'size' => $image->getSize(),
                'thumbnail' => false
            ]);
        }
        $gallery->images()->saveMany($imagesToSave);

        return response()->json([
            'slug' => $slug
        ]);
    }

    public function show($slug)
    {
        return ImageResource::collection(Image::with('gallery')->whereHas('gallery', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get());

    }

    public function edit($id)
    {
        return new GalleryEditResource(Gallery::where('id', $id)->with(['category', 'images'])->firstorfail());
    }

    public function update(GalleryUpdateRequest $request, $id)
    {
        $user = Auth::id();
        $slug = Str::slug($request->title);

        $gallery = Gallery::where('id', $id)->firstorfail();
        $images = DB::table('images')->where([
            'gallery_id' => $id,
            'thumbnail' => 0,
        ])->selectRaw('CAST(id as CHAR(50)) as id, path')->get()->toArray();

        $gallery->user_id = $user;
        $gallery->title = $request->title;
        $gallery->category_id = $request->category;
        $gallery->slug = $slug;
        $gallery->save();

        if ($request->file('thumbnail')) {

            $thumbnail = $gallery->images()->where('thumbnail', '=', 1)->firstorfail();
            $current_thumbnail_path = $thumbnail->path;

            Storage::delete($current_thumbnail_path);

            $thumbnail_file = $request->file('thumbnail');
            $path = $thumbnail_file->store("images/galleries/$id", 'public');

            $thumbnail->user_id = $user;
            $thumbnail->original_name = $thumbnail_file->getClientOriginalName();
            $thumbnail->path = $path;
            $thumbnail->extension = $thumbnail_file->extension();
            $thumbnail->size = $thumbnail_file->getSize();

            $thumbnail->save();

        }

        if ($request->file('images')) {

            $imagesToSave = array();

            foreach ($request->file('images') as $image) {

                $path = $image->store("images/galleries/$id", 'public');

                $imagesToSave[] = new Image([
                    'user_id' => $user,
                    'original_name' => $image->getClientOriginalName(),
                    'path' => $path,
                    'extension' => $image->extension(),
                    'size' => $image->getSize(),
                    'thumbnail' => false
                ]);
            }
            $gallery->images()->saveMany($imagesToSave);
        }

        $originalImagesIds = array_column($images, 'id');

        if ($originalImagesIds !== $request->originalImagesIds) {

            $originalImagesPaths = array_column($images, 'path');
            $imagesToDelete = array_diff($originalImagesIds, $request->originalImagesIds);

            foreach ($imagesToDelete as $key => $value) {
                Storage::delete($originalImagesPaths[$key]);
            }

            $gallery->images()->whereIn('id', $imagesToDelete)->delete();
        }

        return response()->json([
            'message' => 'Galerie byla aktualizována',
            'slug' => $slug
        ]);

    }

    public function destroy($id)
    {
        try {

            Gallery::where('id', $id)->firstOrFail()->delete();

            Storage::deleteDirectory("public/images/galleries/$id");

            return response()->json(['message' => 'Galerie byla smazána']);

        } catch (Throwable $e) {
            report($e);

            return response()->json(['message' => 'Došlo k chybě při mazání galerie'], 500);

        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryStoreRequest;
use App\Http\Requests\GalleryUpdateRequest;
use App\Http\Resources\Admin\GalleryEditResource;
use App\Http\Resources\Admin\GalleryListResource;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{

    public function list()
    {
        return GalleryListResource::collection(Gallery::with(
            ['user', 'category', 'images' => function ($query) {$query->where('thumbnail', 1);}])->orderBy('created_at', 'DESC')->get());
    }

    public function store(GalleryStoreRequest $request)
    {

//        $user = Auth::id();
        $user = 1;

        $slug = Str::slug($request->title);

        $gallery = new Gallery([
            'user_id' => $user,
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => $slug
        ]);

        $gallery->save();

        $images = array();
        $thumbnail_file = $request->file('thumbnail');
        $images[] = new Image([
            'user_id' => $user,
            'original_name' => $thumbnail_file->getClientOriginalName(),
            'path' => $thumbnail_file->store("images/galleries/$gallery->id"),
            'extension' => $thumbnail_file->extension(),
            'size' => $thumbnail_file->getSize(),
            'thumbnail' => true
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store("images/galleries/$gallery->id");

            $images[] = new Image([
                'user_id' => $user,
                'original_name' => $image->getClientOriginalName(),
                'path' => $path,
                'extension' => $image->extension(),
                'size' => $image->getSize(),
                'thumbnail' => false
            ]);

        }

        $gallery->images()->saveMany($images);

        return response()->json([
            'slug' => $slug
        ]);
    }

    public function show($slug)
    {
        return [
        ];
    }

    public function edit($id)
    {
        return new GalleryEditResource(Gallery::where('id', $id)->with(['category', 'images'])->firstorfail());
    }

    public function update(GalleryUpdateRequest $request, $id)
    {
        //        $user = Auth::id();
        $user = 1;
        $slug = Str::slug($request->title);

        $gallery = Gallery::where('id', $id)->firstorfail();

        $gallery->user_id = $user;
        $gallery->title = $request->title;
        $gallery->category_id = $request->category;
        $gallery->slug = $slug;
        $gallery->save();

        if($request->file('thumbnail')) {

            $thumbnail = $gallery->images()->where('thumbnail', '=', 1)->firstorfail();
            $current_thumbnail_path = $thumbnail->path;

            Storage::delete($current_thumbnail_path);

            $thumbnail_file = $request->file('thumbnail');
            $path = $thumbnail_file->store("images/galleries/$gallery->id");

            $thumbnail->user_id = $user;
            $thumbnail->original_name = $thumbnail_file->getClientOriginalName();
            $thumbnail->path = $path;
            $thumbnail->extension = $thumbnail_file->extension();
            $thumbnail->size = $thumbnail_file->getSize();

            $thumbnail->save();

        }
        if($request->file('images')){
            $images = array();

            foreach ($request->file('images') as $image) {
            $path = $image->store("images/galleries/$gallery->id");

            $images[] = new Image([
                'user_id' => $user,
                'original_name' => $image->getClientOriginalName(),
                'path' => $path,
                'extension' => $image->extension(),
                'size' => $image->getSize(),
                'thumbnail' => false
            ]);
            }

            $gallery->images()->saveMany($images);

        }

        $images = $gallery->images()->select('id','path')->where('thumbnail', '=', 0)->get()->toArray();

        $originalImagesIds = array_column($images, 'id');

        if($originalImagesIds != $request->originalImagesIds) {

            $imagesToDelete = array_diff($originalImagesIds, $request->originalImagesIds);

            $originalImagesPaths = array_column($images, 'path');

            foreach ($imagesToDelete as $key=>$value) {
                Storage::delete($originalImagesPaths[$key]);
            }

            $gallery->images()->whereIn('id', $imagesToDelete)->delete();
        }

        return response()->json([
            'slug' => $slug
        ]);

    }

    public function destroy($id)
    {



        Gallery::where('slug', $slug)->first()->delete();
    }
}

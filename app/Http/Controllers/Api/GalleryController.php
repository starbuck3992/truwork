<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminGalleryResource;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GalleryController extends Controller
{

    public function list()
    {
        return AdminGalleryResource::collection(Gallery::with('user', 'category')->orderBy('created_at', 'DESC')->get());
    }

    public function store(Request $request)
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

        $images = array();
        $thumbnail_file = $request->file('thumbnail');
        $images[] = new Image([
            'user_id' => $user,
            'original_name' => $thumbnail_file->getClientOriginalName(),
            'path' => $thumbnail_file->store("images/galleries/$slug"),
            'extension' => $thumbnail_file->extension(),
            'size' => $thumbnail_file->getSize(),
            'thumbnail' => true
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store("images/galleries/$slug");

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

    public function edit($slug)
    {
        return [
        ];
    }

    public function update()
    {
        return [
        ];
    }

    public function destroy($slug)
    {
        Gallery::where('slug', $slug)->first()->delete();
    }
}

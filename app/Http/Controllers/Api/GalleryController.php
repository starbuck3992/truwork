<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminGalleryResource;
use App\Models\Gallery;
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

        $gallery = Gallery::create([
            'title' => $request->title,
            'user_id' => $user,
            'category_id' => 1,
            'slug' => Str::slug($request->title)
        ]);

        $images = array();

        foreach ($request->file('images') as $image) {

            $path = $image->store("images/galleries/$gallery->id");

            $images[] = [
                'user_id' => $user,
                'original_name' => $image->getClientOriginalName(),
                'path' => $path,
                'extension' => $image->extension(),
                'size' => $image->getSize()
            ];

        }

        $gallery->images()->createMany($images);

        return response()->json([
            'slug' => $gallery->slug
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

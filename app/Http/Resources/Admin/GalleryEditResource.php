<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'category'   => new CategoryResource($this->whenLoaded('category')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
        ];
    }
}

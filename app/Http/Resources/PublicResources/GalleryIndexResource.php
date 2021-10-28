<?php

namespace App\Http\Resources\PublicResources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryIndexResource extends JsonResource
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
            'slug' => $this->slug,
            'thumbnail' => ImageResource::collection($this->whenLoaded('images')),
        ];
    }
}

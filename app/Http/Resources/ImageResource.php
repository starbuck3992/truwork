<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ImageResource extends JsonResource
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
            'original_name' => $this->title,
            'size' => $this->size,
            'extension' => $this->extension,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user'   => new UserResource($this->whenLoaded('user')),
        ];
    }
}

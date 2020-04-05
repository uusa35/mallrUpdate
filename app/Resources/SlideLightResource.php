<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideLightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'caption' => $this->caption,
            'order' => $this->order,
            'large' => $this->imageLargeLink,
            'path' => $this->path ? $this->pathLink : null,
            'url' => $this->url ? $this->url : env('APP_URL'),
        ];
    }
}

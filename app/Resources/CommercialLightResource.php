<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommercialLightResource extends JsonResource
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
//            'name' => $this->name,
//            'caption' => $this->caption,
            'thumb' => $this->imageThumbLink,
            'medium' => $this->imageMediumLink,
            'url' => $this->url,
            'path' => $this->pathLink,
            'on_home' => $this->on_home,
        ];
    }
}

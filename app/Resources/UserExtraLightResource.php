<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Illuminate\Support\Str;

class UserExtraLightResource extends JsonResource
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
            'slug' => ucfirst(Str::limit($this->slug ? $this->slug : $this->name, 30, '')),
            'thumb' => $this->getCurrentImageAttribute('image'),
            'fullMobile' => $this->fullMobile,
            'rating' => $this->rating,
            'has_map' => ($this->longitude && $this->latitude),
            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,
        ];
    }
}

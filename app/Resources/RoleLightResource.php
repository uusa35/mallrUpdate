<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleLightResource extends JsonResource
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
            'name' => ucfirst($this->name),
            'slug' => ucfirst($this->slug),
            'caption' => ucfirst($this->caption),
            'thumb' => $this->getCurrentImageAttribute(),
            'color' => $this->color
        ];
    }
}

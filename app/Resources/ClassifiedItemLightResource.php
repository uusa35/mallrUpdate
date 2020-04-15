<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

Carbon::setLocale(request()->header('lang'));

class ClassifiedItemLightResource extends JsonResource
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
            'on_home' => $this->property->on_home,
            'properties' => PropertyExtraLightResource::make($this->whenLoaded('properties')),
            'categoryGroup' => CategoryGroupExtraLightResource::make($this->whenLoaded('categoryGroup'))
        ];
    }
}

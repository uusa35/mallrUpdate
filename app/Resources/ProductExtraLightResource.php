<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Illuminate\Support\Str;

class ProductExtraLightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => ucfirst(Str::limit($this->name,30,'')),
            'on_new' => $this->on_new,
            'exclusive' => $this->exclusive,
            'isOnSale' => $this->isOnSale,
            'finalPrice' => $this->finalPrice,
            'thumb' => $this->imageThumbLink,
            'isReallyHot' => $this->isReallyHot,
        ];
    }
}

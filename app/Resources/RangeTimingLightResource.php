<?php

namespace App\Http\Resources;

use App\Models\Service;
use App\Models\Timing;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RangeTimingLightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
//        dd($request->start_date);
    }
}

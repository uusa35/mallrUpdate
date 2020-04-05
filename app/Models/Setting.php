<?php

namespace App\Models;


class Setting extends PrimaryModel
{
    protected $localeStrings = ['address', 'country', 'company', 'description', 'shipment_notes', 'policy', 'terms'];
    protected $guarded = [''];
    protected $casts = [
        'show_commercials' => 'boolean',
        'splash_on' => 'boolean',
        'cash_on_delivery' => 'boolean'
    ];

    public function getLogoLargeAttribute()
    {
        return asset(env('LARGE') . $this->logo);
    }

    public function getLogoThumbAttribute()
    {
        return asset(env('THUMBNAIL') . $this->logo);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}

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
        return $this->checkStorageSpaces() ? $this->getStorageSpacesUrl('large') . $this->logo : asset(env('LARGE') . $this->logo);
    }

    public function getLogoThumbAttribute()
    {
        return $this->checkStorageSpaces() ? $this->getStorageSpacesUrl('thumbnail') . $this->logo : asset(env('THUMBNAIL') . $this->logo);
    }

    public function getLogoAttribute()
    {
        return $this->checkStorageSpaces() ? $this->getStorageSpacesUrl('thumbnail') . $this->logo : asset(env('THUMBNAIL') . $this->logo);
    }

    public function getSizeChartImageAttribute()
    {
        return $this->checkStorageSpaces() ? $this->getStorageSpacesUrl('large') . $this->size_chart : asset(env('LARGE') . $this->size_chart);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}

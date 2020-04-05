<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class CategoryGroup extends PrimaryModel
{
    use ModelHelpers, LocaleTrait;
    protected $localeStrings = ['name'];
    protected $guarded = [''];
    protected $casts = [
        'on_home' => 'boolean',
        'is_multi' => 'boolean'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_category_groups');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'category_group_property');
    }

    public function classifieds()
    {
        return $this->belongsToMany(Classified::class,'classified_property');
    }
}

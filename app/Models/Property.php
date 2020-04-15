<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class Property extends PrimaryModel
{
    use ModelHelpers, LocaleTrait;
    public $localeStrings = ['name', 'description'];
    protected $guarded = [''];
    protected $casts = [
        'on_home' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function categoryGroups()
    {
        return $this->belongsToMany(CategoryGroup::class, 'category_group_property');
    }

    public function classifieds()
    {
        return $this->belongsToMany(Classified::class,'classified_property');
    }

    public function ClassifiedItems() {
        return $this->belongsToMany(ClassifiedItem::class,'classified_property');
    }
}

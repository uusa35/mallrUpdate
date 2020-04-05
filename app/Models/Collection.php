<?php

namespace App\Models;

class Collection extends PrimaryModel
{
    protected $localeStrings = ['slug'];
    protected $guarded = [''];

    // Company that owns such tag;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_meta()
    {
        return $this->hasMany(OrderMeta::class);
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'collectionable');
    }

    public function services()
    {
        return $this->morphedByMany(Service::class, 'collectionable');
    }

    public function fans()
    {
        return $this->belongsToMany(User::class, 'fans','collection_id','fan_id');
    }
}

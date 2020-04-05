<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends PrimaryModel
{
    use SoftDeletes;
    protected $localeStrings = ['name', 'description'];
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'item_service');
    }

    public function addons() {
        return $this->belongsToMany(Addon::class, 'addon_item');
    }
}

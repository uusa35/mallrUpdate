<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addon extends PrimaryModel
{
    use SoftDeletes;
    protected $localeStrings = ['name', 'description'];
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'addon_service');
    }

    public function items() {
        return $this->belongsToMany(Item::class, 'addon_item');
    }
}

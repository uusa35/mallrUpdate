<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classified extends PrimaryModel
{
    use SoftDeletes, ModelHelpers;
    protected $localeStrings = ['name', 'description'];
    protected $guarded = [''];
    protected $dates = ['created_at', 'updated_at', 'expired_at'];
    protected $casts = [
        'active' => 'boolean',
        'on_home' => 'boolean',
        'is_property' => 'boolean',
        'is_negotiable' => 'boolean',
        'is_available' => 'boolean',
        'is_paid' => 'boolean',
        'exclusive' => 'boolean',
        'is_exclusive' => 'boolean',
        'is_featured' => 'boolean',
        'has_balcony' => 'boolean',
        'only_whatsapp' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'classified_property');
    }

    public function categoryGroups()
    {
        return $this->belongsToMany(CategoryGroup::class, 'classified_property');
    }

    // relation for the pivot table category_property
    public function items()
    {
        return $this->hasMany(ClassifiedItem::class);
    }

    public function notificationAlerts()
    {
        return $this->morphMany(Notification::class, 'notificationable');
    }

    // ManyToMay Morph
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'classified_id');
    }

    // Many Morph
    public function slides()
    {
        return $this->morphMany(Slide::class, 'slidable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    /**
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeNotExpired($q)
    {
        return $q->whereDate('expired_at', '>', Carbon::today()->subYears(3)); // temporarly i did it to show adds
    }

    public function scopeExpired($q)
    {
        return $q->whereDate('expired_at', '<', Carbon::today());
    }

}

<?php

namespace App\Models;


class Survey extends PrimaryModel
{
    use ModelHelpers;
    protected $guarded = [''];
    protected $localeStrings = ['slug', 'description'];
    protected $casts = [
        'is_home' => 'boolean',
        'is_footer' => 'boolean',
        'is_desktop' => 'boolean',
        'is_order' => 'boolean',
        'active' => 'boolean'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'survey_user');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function scopeHasQuestions($q)
    {
        return $q->whereHas('questions', function ($q) {
            return $q->active()->whereHas('answers', function ($q) {
                $q->active();
            }, '>', 0);
        }, '>', 0);
    }

    public function getFinalPriceAttribute()
    {
        return $this->on_sale ? $this->net_price : $this->price;
    }
}

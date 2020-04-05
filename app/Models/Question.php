<?php

namespace App\Models;


class Question extends PrimaryModel
{
    use ModelHelpers;
    protected $localeStrings = ['name','notes'];
    protected $guarded = [''];
    protected $casts = [
        'is_multi' => 'boolean',
        'is_text' => 'boolean',
        'active' => 'boolean'
    ];

    public function surveys()
    {
        return $this->belongsToMany(Survey::class);
    }

    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }


    public function results()
    {
        return $this->hasMany(Result::class);
    }


}

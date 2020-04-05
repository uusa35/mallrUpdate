<?php

namespace App\Models;


class Answer extends PrimaryModel
{
    use ModelHelpers;
    protected $localeStrings = ['name'];
    protected $guarded = [''];
    protected $cast = [
        'is_multi' => 'boolean',
        'is_dropdown' => 'boolean',
        'active' => 'boolean'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function results()
    {
        return $this->hasMany(Answer::class);
    }
}

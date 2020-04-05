<?php

namespace App\Models;


class Result extends PrimaryModel
{
    protected $guarded = [''];

    function question()
    {
        return $this->belongsTo(Question::class);
    }

    function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}

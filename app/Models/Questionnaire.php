<?php

namespace App\Models;

class Questionnaire extends PrimaryModel
{
    use ModelHelpers;
    protected $guarded = [''];

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function order()
    {
        return $this->hasManyThrough(Order::class, OrderMeta::class);
    }

    public function order_meta()
    {
        return $this->hasMany(OrderMeta::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function survey() {
        return $this->belongsTo(Survey::class);
    }
}

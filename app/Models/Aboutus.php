<?php

namespace App\Models;

class Aboutus extends PrimaryModel
{
    protected $table = 'aboutus';
    protected $guarded = [''];
    protected $localStrings = ['title','body'];
}

<?php

namespace App\Models;


class Page extends PrimaryModel
{
    protected $localeStrings = ['slug','title','content'];
    protected $guarded = [''];
}

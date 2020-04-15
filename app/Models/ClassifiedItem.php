<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassifiedItem extends Pivot
{
    protected $table = 'classified_property';
    protected $guarded = [''];

    public function categoryGroup()
    {
        return $this->belongsTo(CategoryGroup::class);
    }

    public function properties()
    {
        return $this->belongsTo(Property::class);
    }

    public function classified()
    {
        return $this->belongsTo(Classified::class);
    }

}

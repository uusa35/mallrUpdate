<?php

namespace App\Models;

class ShipmentPackage extends PrimaryModel
{
    protected $guarded = [''];
    protected $localeStrings = ['slug', 'notes'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }


    public function getFinalPrice($totalWeight)
    {
        if($this->is_local) {
            return $this->charge;
        }
        $totalWeight = (float)$totalWeight;
        if ($totalWeight < 0.5) {
            return (float) $this->charge + ($this->charge * 0.18);
        } elseif ($totalWeight <= 1) {
            return $this->charge_one + ($this->charge_one * 0.18);
        } elseif ($totalWeight <= 1.5) {
            return (float) $this->charge_two + ($this->charge_two * 0.18);
        } elseif ($totalWeight <= 2) {
            return (float) $this->charge_three + ($this->charge_three * 0.18);
        } elseif ($totalWeight > 2) {
            return (float) $this->charge_four + ($this->charge_four * 0.18);
        }
    }
}

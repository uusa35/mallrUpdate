<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

class OrderMeta extends PrimaryModel
{
    protected $guarded = [''];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function timing()
    {
        return $this->belongsTo(Timing::class);
    }

    public function product_attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'destination_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function merchant() {
        return $this->belongsTo(User::class,'merchant_id');
    }
    public function getIsProductTypeAttribute()
    {
        return strtolower($this->item_type) === 'product';
    }

    public function getIsServiceTypeAttribute()
    {
        return strtolower($this->item_type) === 'service';
    }

    public function getIsQuestionnaireTypeAttribute()
    {
        return strtolower($this->item_type) === 'questionnaire';
    }

    public function scopeBestSaleCollections($q)
    {
        return $q->with(['collection.user' => function ($q) {
            $q->onHome()->active()->with(['products' => function ($q) {
            }]);
        }])
            ->select(DB::raw('COUNT(*) as occurrences, collection_id'))
            ->groupBy('collection_id')
            ->orderBy('occurrences', 'DESC')
            ->take(10)
            ->get()
            ->pluck('collection');
    }
}

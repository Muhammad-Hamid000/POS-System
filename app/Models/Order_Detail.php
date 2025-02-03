<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{

    protected $table = 'order__details';
    protected $fillable = [
        'order_id',
        'product_id',
        'quality',
        'unitprice',
        'amount',
        'discount'
    ];



    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }


    public function Order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}

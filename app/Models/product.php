<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'quantity',
        'description',
        'alert_stock'
    ];

    public function orderdetail()
    {
        return $this->hasMany('App\Models\Order_Detail');
    }
    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }
}

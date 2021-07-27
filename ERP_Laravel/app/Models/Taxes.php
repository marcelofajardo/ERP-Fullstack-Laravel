<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Order;
use App\Http\Models\Order_product;


class Taxes extends Model
{
    use HasFactory;

    public function order()    {
        return $this->belongsToMany(Order::class);
    }

    public function order_products()    {
        return $this->belongsToMany(Order_product::class);
    }

}

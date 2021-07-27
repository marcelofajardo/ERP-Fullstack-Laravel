<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Order;
use App\Http\Models\Discount;
use App\Http\Models\Taxes;


class Order_product extends Model
{
    use HasFactory;

    /**
     * A order line belongs to one single order.
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function disounts(){
        return $this->belongsToMany(Discount::class);
    }
    public function taxes(){
        return $this->belongsToMany(Taxes::class);
    }
}

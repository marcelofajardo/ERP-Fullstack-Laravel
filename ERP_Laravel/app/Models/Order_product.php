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
    protected $table = 'order_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'taxes_id',
        'discount_id',
        'quantity'
    ];

  
    public function disounts(){
        return $this->belongsToMany(Discount::class);
    }
    public function taxes(){
        return $this->belongsToMany(Taxes::class);
    }
}

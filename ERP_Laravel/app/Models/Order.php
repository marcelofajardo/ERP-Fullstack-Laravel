<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/*use App\Http\Models\Product;*/
use App\Http\Models\User;
/*use App\Http\Models\Bill;
use App\Http\Models\Shipping;*/
use App\Http\Models\Order_product;
use App\Http\Models\Discount;
use App\Http\Models\Taxes;



class Order extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'taxes_id',
        'discount_id',
        'payment_id',
        'adress_id',
        'date',
        'gross_total',
        'net_total',
        'comments'     
    ];

    protected $guarded = [];

  
     /**
     * One user has many orders
     */ 
    public function user(){
        return $this->belongsTo(User::class);
    }

     /**
     * One order has many lines
     */
    public function order_products(){
        return $this->hasMany(Order_product::class);
    }

    /**
     * One order has many discounts
     */
    public function disounts(){
        return $this->belongsToMany(Discount::class);
    }

    /**
     * One order has many taxes
     */
    public function taxes(){
        return $this->belongsToMany(Taxes::class);
    }
}

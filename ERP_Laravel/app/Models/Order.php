<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/*use App\Http\Models\Product;*/
use App\Models\User;
/*use App\Http\Models\Bill;
use App\Http\Models\Shipping;*/
use App\Models\Order_product;
use App\Models\Discount;
use App\Models\Taxes;



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
    public function Order_products(){
        return $this->hasMany(Order_product::class,'order_id','id');
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

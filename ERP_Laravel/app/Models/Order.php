<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Product;
use App\Http\Models\User;
use App\Http\Models\Bill;
use App\Http\Models\Shipping;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bill(){
        return $this->hasOne(Bill::class);
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }
}

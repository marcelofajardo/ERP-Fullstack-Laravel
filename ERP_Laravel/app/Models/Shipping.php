<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Order;

class Shipping extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orders(){
        return $this->hasMany(Order::class);
    }
}

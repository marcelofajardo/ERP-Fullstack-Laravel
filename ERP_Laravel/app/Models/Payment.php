<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Order;


class Payment extends Model
{
    use HasFactory;
    
    public function order(){
        return $this->HasMany(Order::class);
    }

}

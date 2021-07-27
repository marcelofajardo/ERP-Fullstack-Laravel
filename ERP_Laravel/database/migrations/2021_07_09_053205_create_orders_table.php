<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('taxes_id')->nullable();
            $table->foreignId('discount_id')->nullable();
            $table->foreignId('payment_id')->nullable();
            $table->foreignId('adress_id')->nullable();
            $table->date('date');          
            $table->decimal('gross_total');
            $table->decimal('net_total');
            $table->text('comments')->nullable();           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

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
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->enum('status',['processing','completed','canceled']);
            $table->enum('payment',['cash','paypal','creditcard','transfer']);
            $table->integer('total_products');
            $table->decimal('total');
            $table->decimal('total_paid');
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('ship_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('shipping_id')->references('id')->on('shippings');
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

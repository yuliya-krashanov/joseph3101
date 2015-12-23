<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('delivery_method')->unsigned();
            $table->foreign('delivery_method')->references('id')->on('delivery_methods');
            $table->integer('payment_method')->unsigned();
            $table->foreign('payment_method')->references('id')->on('payment_methods');            
            $table->boolean('print'); 
            $table->integer('status')->unsigned();
            $table->foreign('status')->references('id')->on('statuses');           
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
        Schema::drop('orders');
    }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 40);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 50)->nullable();
            $table->string('address_city', 50);
            $table->string('address_street', 50);
            $table->string('address_street_number', 10);
            $table->string('address_home_number', 10);
            $table->integer('address_floor')->nullable();
            $table->string('stripe_customer_id')->nullable();
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
        Schema::drop('users');
    }
}

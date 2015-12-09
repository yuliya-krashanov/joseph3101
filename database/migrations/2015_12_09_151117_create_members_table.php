<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('customer_id', false, true)->unique();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address_city', 50);
            $table->string('address_street', 50);
            $table->string('address_street_number', 10);
            $table->string('address_home_number', 10);
            $table->date('birth_date');
            $table->string('email', 40);
            $table->string('mobile_phone', 40);
            $table->string('additional_phone', 40)->nullable();
            $table->string('status', 30);
            $table->string('partner_first_name', 50)->nullable();
            $table->string('partner_last_name', 50)->nullable();
            $table->date('partner_birth_date')->nullable();
            $table->string('partner_mobile_phone', 40)->nullable();
            $table->string('partner_email', 40)->nullable();
            $table->boolean('send_to_mail');
            $table->boolean('send_to_mobile');

            $table->rememberToken();
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
        Schema::drop('members');
    }

}

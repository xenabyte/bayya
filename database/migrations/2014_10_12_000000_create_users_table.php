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
            $table->bigIncrements('id');
            $table->string('phone_number')->nullable();
            $table->string('usd_wallet')->nullable();
            $table->string('btc_wallet')->nullable();
            $table->string('btc_address')->nullable();
            $table->string('bonus')->nullable();
            $table->string('username')->nullable();
            $table->string('referrer')->nullable();
            $table->string('kycfront')->nullable();
            $table->string('kycback')->nullable();
            $table->string('status')->nullable();
            $table->string('viewable_password')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('location')->nullable();
            $table->string('currency')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::drop('users');
    }
}

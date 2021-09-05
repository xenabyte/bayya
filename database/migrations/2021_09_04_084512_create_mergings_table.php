<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mergings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('buyer_user_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('seller_user_id')->nullable();
            $table->integer('seller_consent')->nullable();
            $table->integer('pay_received_status')->nullable();
            $table->integer('payment_status')->nullable();
            $table->datetime('merge_at')->nullable();
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
        Schema::dropIfExists('mergings');
    }
}

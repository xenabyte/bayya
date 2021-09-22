<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_user_id')->nullable();
            $table->string('seller_payment_mode')->nullable();
            $table->float('selling_amount')->nullable();
            $table->float('selling_rate')->nullable();
            $table->string('currency')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('buyer_user_id')->nullable();
            $table->string('merge_status')->nullable();
            $table->datetime('merge_at')->nullable();
            $table->string('trade_minutes')->nullable();
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
        Schema::dropIfExists('sellers');
    }
}

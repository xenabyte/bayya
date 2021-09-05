<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('merging_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('buyer_user_id')->nullable();
            $table->integer('seller_user_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->text('dispute_reason')->nullable();
            $table->integer('dispute_status')->nullable();
            $table->datetime('resolved_at')->nullable();
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
        Schema::dropIfExists('disputes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_plates', function (Blueprint $table) {

            $table->unsignedBigInteger('orders_id');
            $table->unsignedBigInteger('plates_id');

            $table->foreign('orders_id')->references('id')->on('orders');
            $table->foreign('plates_id')->references('id')->on('plates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_plates');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('consumable_id')->unsigned();
            $table->bigInteger('restaurant_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->integer('quantity');
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
        Schema::dropIfExists('consumable_order');
    }
}

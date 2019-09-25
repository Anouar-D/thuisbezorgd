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
            $table->bigInteger('consumable_id');
            $table->bigInteger('order_id');
            $table->integer('quantity');
            $table->primary('consumable_id', 'order_id');
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

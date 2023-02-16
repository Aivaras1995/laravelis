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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column:'order_id');
            $table->string(column:'product_name');
            $table->unsignedBigInteger(column:'product_id');
            $table->BigInteger(column:'quantity');
            $table->string(column:'price');
            $table->unsignedBigInteger(column:'status_id');

            $table->timestamps();

            $table->foreign(columns: 'order_id')->references('id')->on(table:'orders');
            $table->foreign(columns: 'product_id')->references('id')->on(table:'products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};

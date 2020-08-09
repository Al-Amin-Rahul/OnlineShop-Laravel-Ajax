<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('customer_id')->nullable();
            $table->integer('product_id');
            $table->string('product_name');
            $table->decimal('product_weight');
            $table->integer('product_wrap')->nullable();
            $table->string('dis_code')->nullable();
            $table->decimal('product_price',10,2);
            $table->tinyInteger('product_qty');
            $table->double('order_total',10,2);
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
        Schema::dropIfExists('order_details');
    }
}

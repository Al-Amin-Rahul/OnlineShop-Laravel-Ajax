<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->unique();
            $table->string('slug',120)->unique();
            $table->integer('category_id');
            $table->string('code',20)->unique();
            $table->integer('stock');
            $table->decimal('price',10, 2);
            $table->decimal('price_3',10, 2)->default(0);
            $table->decimal('price_6',10, 2)->default(0);
            $table->decimal('price_12',10, 2)->default(0);
            $table->decimal('price_25',10, 2)->default(0);
            $table->text('description');
            $table->text('product_feature');
            $table->tinyInteger('top_sale');
            $table->tinyInteger('flash_sale');
            $table->integer('flash_sale_ratio')->default(0);
            $table->tinyInteger('occational_offer');
            $table->integer('occational_offer_ratio')->default(0);
            $table->tinyInteger('daily_offer');
            $table->integer('daily_offer_ratio')->default(0);
            $table->tinyInteger('mela');
            $table->integer('mela_offer_ratio')->default(0);
            $table->tinyInteger('publication_status')->default(1);
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
}

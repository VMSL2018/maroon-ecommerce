<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('sku')->unique(); // stock keeping unit
            
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
            
            $table->integer('sub_categories_id')->unsigned();
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
            
            $table->integer('sub_slave_categories_id')->unsigned(); //
            $table->foreign('sub_slave_categories_id')->references('id')->on('sub_slave_categories');
            
            $table->string('product_title');
            $table->string('product_sub_title')->nullable();
            $table->string('product_description')->nullable();
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->string('image_url')->nullable();
            
            //$table->string('size_chart')->nullable();
            //$table->integer('featured')->nullable();
            //$table->integer('sale')->nullable();
            
            $table->string('slug')->unique()->nullable(); // user friendly url
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

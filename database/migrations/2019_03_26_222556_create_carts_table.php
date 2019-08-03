<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('invoices_id');
            //$table->foreign('invoices_id')->references('id')->on('invoices');
            
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
            
            $table->integer('colors_id')->unsigned();
            $table->foreign('colors_id')->references('id')->on('colors');
            
            $table->integer('sizes_id')->unsigned();
            $table->foreign('sizes_id')->references('id')->on('sizes');
            
            $table->integer('quantity')->unsigned();
            $table->integer('sub_total')->unsigned();
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
        Schema::dropIfExists('carts');
    }
}

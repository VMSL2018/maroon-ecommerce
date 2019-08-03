<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('invoices_id');
            //$table->foreign('invoices_id')->references('id')->on('invoices');
            
            
            $table->string('sub_total');
            $table->string('shipping');
            $table->string('order_total');
            $table->text('billing_address');
            $table->text('shipping_address');
            $table->string('payment_method');
            $table->string('order_status');
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
        Schema::dropIfExists('orders');
    }
}

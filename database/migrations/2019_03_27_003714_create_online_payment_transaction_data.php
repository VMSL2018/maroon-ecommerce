<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlinePaymentTransactionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_payment_transaction_data', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('invoices_id');
            //$table->foreign('invoices_id')->references('id')->on('invoices');
            
            $table->string('merchant_transaction_id');
            $table->string('gateway_transaction_id');
            $table->string('payment_status');
            $table->string('payment_method');
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
        Schema::dropIfExists('online_payment_transaction_data');
    }
}

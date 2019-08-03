<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSlaveCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_slave_categories', function (Blueprint $table) {
            $table->increments('id');
            /*
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');   // Parent Category
            */
            $table->integer('sub_categories_id')->unsigned();
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories'); // Parent Sub Category
            
            $table->string('name');
            $table->integer('status');
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
        Schema::dropIfExists('sub_slave_categories');
    }
}

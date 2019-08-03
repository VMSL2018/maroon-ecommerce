<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCategoriesId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->renameColumn('category_id', 'categories_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            
            $table->dropForeign(['sub_category_id']);
            $table->renameColumn('sub_category_id', 'sub_categories_id');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
            
            $table->dropForeign(['sub_slave_category_id']);
            $table->renameColumn('sub_slave_category_id', 'sub_slave_categories_id');
            $table->foreign('sub_slave_categories_id')->references('id')->on('sub_slave_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->dropForeign(['category_id']);
            $table->renameColumn('category_id', 'categories_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            
            $table->dropForeign(['sub_category_id']);
            $table->renameColumn('sub_category_id', 'sub_categories_id');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
            
            $table->dropForeign(['sub_slave_category_id']);
            $table->renameColumn('sub_slave_category_id', 'sub_slave_categories_id');
            $table->foreign('sub_slave_categories_id')->references('id')->on('sub_slave_categories');
            
        });
    }
}

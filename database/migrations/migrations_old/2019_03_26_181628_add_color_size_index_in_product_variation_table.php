<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorSizeIndexInProductVariationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variations', function (Blueprint $table) {
            //$table->dropForeign(['color']);
            $table->renameColumn('color', 'colors_id');
            //$table->foreign('colors_id')->references('id')->on('colors');
            
            //$table->dropForeign(['size']);
            $table->renameColumn('size', 'sizes_id');
            //$table->foreign('sizes_id')->references('id')->on('sizes');
            
            $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variations', function (Blueprint $table) {
            //$table->dropForeign(['color']);
            $table->renameColumn('color', 'colors_id');
            $table->foreign('colors_id')->references('id')->on('colors');
            
            //$table->dropForeign(['size']);
            $table->renameColumn('size', 'sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            
            $table->string('image_url')->nullable();
        });
    }
}

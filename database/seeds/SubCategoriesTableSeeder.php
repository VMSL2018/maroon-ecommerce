<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |
        |Sub Categories
        |
        */
        DB::table('sub_categories')->insert([
            'name' => 'Men Tshirt',
            'categories_id' => 1,
            'status' => 1,
        ]);
        
        DB::table('sub_categories')->insert([
            'name' => 'Women Tshirt',
            'categories_id' => 2,
            'status' => 1,
        ]);
    }
}

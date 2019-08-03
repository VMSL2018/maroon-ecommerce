<?php

use Illuminate\Database\Seeder;

class SubSlaveCategoriesTableSeeder extends Seeder
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
        |Sub Slave Categories
        |
        */
        DB::table('sub_slave_categories')->insert([
            'name' => 'Men Long Sleeve Tshirt',
            'categories_id' => 1,
            'sub_categories_id' => 1,
            'status' => 1,
        ]);
        
        DB::table('sub_slave_categories')->insert([
            'name' => 'Women Long Sleeve Tshirt',
            'categories_id' => 2,
            'sub_categories_id' => 2,
            'status' => 1,
        ]);
        
    }
}

<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        | Categories
        */
        
        DB::table('categories')->insert([
            'name' => 'Men',
            'status' => 1,
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Women',
            'status' => 1,
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Children',
            'status' => 1,
        ]);
    }
}

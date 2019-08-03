<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /*
        |--- SIZE
        |--- COLORS
        */
        
        DB::table('colors')->insert([
            'color_name' => 'WHITE',
        ]);
        DB::table('colors')->insert([
            'color_name' => 'BLACK',
        ]);
        DB::table('colors')->insert([
            'color_name' => 'PURPLE',
        ]);
        
        
        DB::table('sizes')->insert([
            'size_name' => 'S',
        ]);
        
        DB::table('sizes')->insert([
            'size_name' => 'M',
        ]);
        
        DB::table('sizes')->insert([
            'size_name' => 'L',
        ]);
        
        DB::table('sizes')->insert([
            'size_name' => 'XL',
        ]);
        
        DB::table('sizes')->insert([
            'size_name' => 'XXL',
        ]);

    }
}

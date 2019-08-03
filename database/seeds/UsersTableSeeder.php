<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
        | Populate Data in User table
        | Populate basic admin with credentials
        |    
        */
        
        /*------------------Super ADMIN-------------------------*/
        
        DB::table('categories')->insert([
            'name' => '',
            'email' => '',
            'email_verified_at' => '',
            'phone_number' => '',
            'password' => '',
            'user_level' => '',
            //'name' => '',
            //'name' => '',
        ]);
        
        /*------------------ADMIN-------------------------*/
        
        DB::table('categories')->insert([
            'name' => '',
            'email' => '',
            'email_verified_at' => '',
            'phone_number' => '',
            'password' => '',
            'user_level' => '',
            //'name' => '',
            //'name' => '',
        ]);
        
        /*------------------Site OPerator-------------------------*/
        
        DB::table('categories')->insert([
            'name' => '',
            'email' => '',
            'email_verified_at' => '',
            'phone_number' => '',
            'password' => '',
            'user_level' => '',
            //'name' => '',
            //'name' => '',
        ]);
        
    }
}

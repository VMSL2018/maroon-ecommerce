<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
/*
|--- ADDED LATER
*/


use App\Cart;
use App\Category;
use App\SubCategory;
use App\SubSlaveCategory;
use App\Invoice;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /*
        |
        |--- MENU
        |
        */
                
        /*
        $categories = Category::all();
        foreach($categories as $category){
            echo "Category :".$category->name."<br>";
            $id = $category->id;
            $sub_category = SubCategory::where('categories_id',$id)->get();
            foreach($sub_category as $row){
                $sub_id = $row->id;
                echo "&nbsp;&nbsp;&nbsp;---".$row->name."<br>";
                $sub_slave_category = SubSlaveCategory::where('sub_categories_id',$sub_id)->get();
                foreach($sub_slave_category as $value){
                    $slave_id = $value->id;
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---".$value->name."<br>";
                }
            }
            
        }
        */

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

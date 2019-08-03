<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductVariation;
use App\Size;
use App\Invoice;
use App\Cart;
use App\Coupon;
use Session;
use View;

class AjaxController extends Controller
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    
    public function __construct()
    {
        /*
            *
            * $this->middleware('auth');
            *
        */

    }
    /*
    |
    |---
    |
    */
    public function choose_size(Request $request){
		$products_id = $request->products_id;
		$colors_id = $request->colors_id;
		
		$size_id = ProductVariation::where('products_id',$products_id)->where('colors_id',$colors_id)->groupBy('sizes_id')->get(['sizes_id']);
		$sizes = array();
		foreach($size_id as $size){
		    $size_name = Size::where('id',$size['sizes_id'])->value('size_name');
		    $sizes[] = array("id"=>$size['sizes_id'],"size_name"=>$size_name);
		}
		
		return $sizes;
    }
    /*
    |
    |---
    |
    */
    public function check_stock(Request $request){
    	
		$products_id = $request->products_id;
		$colors_id = $request->colors_id;
		$sizes_id = $request->sizes_id;
		$stock = ProductVariation::where('products_id',$products_id)->where('colors_id',$colors_id)->where('sizes_id',$sizes_id)->get();
		return $stock;
    }
    /*
    |
    |---
    |
    */
    public function coupon(Request $request){
    	$coupon = $request->coupon;
    	$check_coupon = Coupon::where('coupon_name',$coupon)->count();
    	if($check_coupon <= 0){
    		return "Coupon Expired";
    	}else{
    		$percentage = Coupon::where('coupon_name',$coupon)->value('discount_percentage');
    		return $percentage;
    	}
    }
}

<?php

namespace App\Http\Controllers;

use App\ProductVariation;
use App\Product;
use App\Color;
use App\Size;
use Illuminate\Http\Request;
use Carbon;

class ProductVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $product_id =  $request->product_id;
        $num_of_product_variation = $request->num_of_product_variation;
        
        /*
        |---------------------------------------------------------------
        |SIZE AND COLORS
        |---------------------------------------------------------------
        */
        
        $sizes = Size::get();
        $colors = Color::get();
        
        return view('backend.ecommerce.edit_product_variations')
                    ->with(
                            compact(
                                    'product_id',
                                    'num_of_product_variation',
                                    'sizes',
                                    'colors'
                                )
                        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->products_id;
        $product_color = $request->product_color;
        $product_size = $request->product_size;
        $product_quantity = $request->product_quantity;
        $image_url = $request->image_url;
        
        
        for($i=0;$i < count($product_color);$i++ ){
            
            ProductVariation::create([
                'products_id'                   =>      $product_id,
                'colors_id'                     =>      $product_color[$i],
                'sizes_id'                      =>      $product_size[$i],
                'quantity'                      =>      $product_quantity[$i],
                'image_url'                     =>      $image_url,
               // 'created_at '                   =>      Carbon::now()
            ]);
        }
        
        //return $request->product_color;
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariation $productVariation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariation $productVariation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariation $productVariation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductVariation  $productVariation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariation $productVariation)
    {
        //
    }
}

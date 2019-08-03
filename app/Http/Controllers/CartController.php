<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use Illuminate\Http\Request;
use App\Invoice;
use App\Order;
use App\ProductVariation;
use App\Products;
use App\Color;
use App\Size;
use View;
class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart_items =  Session::get('cart');
        
        if(empty($cart_items)){
            return view('frontend.pages.cart')->with(compact('cart_items')); 
        }else{
           return view('frontend.pages.cart')->with(compact('cart_items')); 
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        $products_id        = $request->products_id;
        $colors_id          = $request->colors_id;
        $sizes_id           = $request->sizes_id;
        $quantity           = $request->quantity;
        $price              = $request->sub_total;
        $sub_total          = $request->sub_total*$quantity;

        
        /*
        |--- Retrieve Product Variation Information
        |--- Table Name : Product_variations
        */
        $product_variations_id      = ProductVariation::where('products_id',$products_id)->where('colors_id',$colors_id)->where('sizes_id',$sizes_id)->value('id');
        $product_variations_image    = ProductVariation::where('id',$product_variations_id)->value('image_url');
        $product_variations_quantity = ProductVariation::where('id',$product_variations_id)->value('quantity');
        /*
        |--- Retrieve Data from Product Table
        */
        $sku = Products::where('id',$products_id)->value('sku');
        $product_title = Products::where('id',$products_id)->value('product_title');
        /*
        |--- COLOR NAME
        |--- SIZE NAME
        */
        $color_name     = Color::where('id',$colors_id)->value('color_name');
        $size_name      = Size::where('id',$sizes_id)->value('size_name');
        

        
        $cart = Session::get('cart');
        $cart[] = array(
            'products_id'                       => $products_id,
            'price'                             => $price,
            'colors_id'                         => $colors_id,
            'color_name'                        => $color_name,
            'sizes_id'                          => $sizes_id,
            'size_name'                         => $size_name,
            'quantity'                          => $quantity,
            'sub_total'                         => $sub_total,
            'product_variations_id'             => $product_variations_id,
            'product_variation_image'           => $product_variations_image,
            'product_variations_quantity'       => $product_variations_quantity,
            'sku'                               => $sku,
            'product_title'                     => $product_title
        );
        
        Session::put('cart', $cart);
        return Session::get('cart');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Cart $cart)
    {
        $id  = $request->id;
        $index = $id-1;
        $cart = Session::get('cart');
        unset($cart[$index]);
        Session::put('cart', $cart);
        return redirect('/cart');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
    
    
    
    public function customer_invoice(Request $request){
        $id = $request->id;
        $invoices_id = \Hashids::decode($id);
        
        $invoice_data = Cart::where('invoices_id',$invoices_id)->get();
        $invoice = Cart::where('invoices_id',$invoices_id)->value('invoices_id');
        $order_data = Order::where('invoices_id',$invoices_id)->get();
        
        return view('frontend.pages.invoice')->with(compact('invoice_data','invoice','order_data'));
        
    }
}

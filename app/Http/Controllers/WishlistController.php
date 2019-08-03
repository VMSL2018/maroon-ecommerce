<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Products;
use Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist =  Session::get('wishlist');
        
        if(empty($wishlist)){
           // return redirect('/home');
           return view('frontend.pages.wishlist')->with(compact('wishlist')); 
        }else{
           return view('frontend.pages.wishlist')->with(compact('wishlist')); 
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
        $products_id    =   \Hashids::decode($request->products_id);
        $id             =   Products::where('id',$products_id)->value('id');
        $sku            =   Products::where('id',$products_id)->value('sku');
        $product_title  =   Products::where('id',$products_id)->value('product_title');
        $price          =   Products::where('id',$products_id)->value('price');
        $image_url      =   Products::where('id',$products_id)->value('image_url');
        
        $wishlist= Session::get('wishlist');
        $wishlist[] = array(
            'products_id'               => $id,
            'price'                     => $price,
            'image_url'                 => $image_url,
            'sku'                       => $sku,
            'product_title'             => $product_title
        );
        
        $wishlist = array_unique($wishlist,SORT_REGULAR);
        
        Session::put('wishlist', $wishlist);

        return Session::get('wishlist');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Wishlist $wishlist)
    {

        $id  = $request->id;
        $index = $id-1;
        
        
        $wishlist = Session::get('wishlist');
        unset($wishlist[$index]);
        Session::put('wishlist', $wishlist);
        return redirect('/wishlist');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}

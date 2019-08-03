<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\SubSlaveCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        $sub_category = SubCategory::with('categories')->get();
        $sub_slave_category = SubSlaveCategory::with('sub_categories')->with('categories')->get();
        
        return view('backend.ecommerce.category')->with(compact('category', 'sub_category','sub_slave_category')); 
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
        $category_name = $request->category_name;
        /*------------------------------------------*/
        $category = new Category;
        $category->name = $category_name;
        $category->status = 1;
        $category->save();
        /*------------------------------------------*/
        
        return $this->index()->with('category_success','Data added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

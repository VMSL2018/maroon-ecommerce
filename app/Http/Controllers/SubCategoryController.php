<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\SubSlaveCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
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
        $sub_category_name = $request->sub_category_name;
        $category_id = $request->category_id;
        /*--------------------------------------------------------*/
        $sub_category = new SubCategory;
        $sub_category->name = $sub_category_name;
        $sub_category->categories_id = $category_id;
        $sub_category->status = 1;
        $sub_category->save();
        /*-------------------------------------------------------*/
        
        return $this->index()->with('sub_success','Data added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}

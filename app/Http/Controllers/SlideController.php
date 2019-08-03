<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Media;
use App\Category;
use App\SubCategory;
use App\SubSlaveCategory;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        $sub_category = SubCategory::with('category')->get();
        $sub_slave_category = SubSlaveCategory::with('sub_category')->with('category')->get();
        $images = Media::get();
        $slides = Slide::orderBy('id', 'DESC')->get();
        

        return view('backend.ecommerce.slide')->with(compact('category', 'sub_category','sub_slave_category','images','slides'));
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
        $this->validate($request, [
            'image_url'     => 'distinct',
        ]);
        
        $image_url = $request->image_url;
        $image_name = $request->image_name;
        
        Slide::create([
            
            'image_name' => $image_name,
            'image_url' => $image_url
        
        ]);
        
        
        return $this->index()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}

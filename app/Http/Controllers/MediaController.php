<?php

namespace App\Http\Controllers;

use App\Media;
use Storage;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Media::get();
        return view('backend.ecommerce.media')->with(compact('images'));
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
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8096'
        ]);
        

        $files = $request->photos;
        if(!empty($files)):
            foreach($files as $row):
               // Storage::disk('public')
               //             ->put($row->getClientOriginalName(),'Contents');
                Storage::disk('public')->put($row->getClientOriginalName(), file_get_contents($row));
            endforeach;
            
            foreach($files as $row):
                Media::create([
                    'image_name' => $row->getClientOriginalName(),
                    'image_url'  => '/storage/'.$row->getClientOriginalName()   
                ]);
            endforeach;
            
        endif;
        
        return $this->index()->with('success');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}

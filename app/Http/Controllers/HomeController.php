<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Slide;
use App\Media;
use App\Category;
use App\SubCategory;
use App\SubSlaveCategory;
use App\Invoice;
use App\Products;
use App\Cart;
use App\Http\Controllers\SmsController;
use Mail;
use Hashids\Hashids;
use View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    
    public function __construct( Request $request)
    {
        /*
            *
            * $this->middleware('auth');
            *
        */
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        /*
        |
        |--- Getting Category data
        |
        */
        $categories = Category::get();
        /*
        |
        |--- Getting slide show data
        |
        */
        $slides = Slide::get();
        /*
        |
        |--- Featured Products
        |
        */
        $featured = Products::where('status',1)->take(4)->get();
        /*
        |
        |--- New Arrivals Products
        |
        */
        $new_arrivals = Products::take(20)->get();

        //$sms = new SmsController();
        //$sms->sendsms('8801534653592','Hello Mr SHovon Rahman');
        
        return view('frontend.index')->with(compact('slides','new_arrivals','featured'));
    
    }
    
    
    public function admindashboard(){
        return view('backend.index');
    }

}

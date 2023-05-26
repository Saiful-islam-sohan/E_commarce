<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {


        $testimonials = Testimonial::where('is_active', 1)
        ->latest('id')
        ->limit(3)
        ->select(['id', 'client_name', 'client_designation', 'client_message', 'client_image'])
        ->get();

        // $catagoryes=Catagory::where('is_active',1)
        // ->latest('id')
        // ->limit(3)
        // ->select(['id','title','catagory_image','slug'])
        // ->get();

        $catagoryes = Catagory::where('is_active', 1)
        ->latest('id')
        ->limit(5)
        ->select(['id', 'title', 'catagory_image','slug'])
        ->get();

        //return $catagoryes;


        return view('frontend.pages.home',compact('testimonials','catagoryes'));
        // , compact('testimonials'));
    }

}

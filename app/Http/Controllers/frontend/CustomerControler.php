<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerControler extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('frontend.pages.customer-dashbord', compact('user'));
    }
}

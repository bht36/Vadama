<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Property;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $banner =Banner::all(); 

        $houses = Property::with(['images'])
        ->where('type', 'house')
        ->where('status', 'available')
        ->get();

        $rooms = Property::with(['images'])
        ->where('type', 'room')
        ->where('status', 'available')
        ->get();

        $apartments = Property::with(['images'])
        ->where('type', 'apartment')
        ->where('status', 'available')
        ->get();


        return view("vadama.index", compact('banner','houses', 'rooms', 'apartments'));
    }
    public function signup(Request $request)
    {
        return view("vadama.signup");
    }
    public function login(Request $request)
    {
        return view("vadama.login");
    }
    public function forgetpassword(Request $request)
    {
        return view("vadama.forgetpassword");
    }
    public function forgetconfirmation(Request $request)
    {
        return view("vadama.forgetconfirmation");
    }
    public function dashboard(Request $request)
    {
        return view("vadama.dashboard");
    }
    public function aboutus(Request $request)
    {
        return view("vadama.aboutus");
    }
    public function housing(Request $request)
    {
        return view("vadama.housing");
    }
}

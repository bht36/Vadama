<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $banner =Banner::all();  
        return view("vadama.index", compact("banner"));
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
}

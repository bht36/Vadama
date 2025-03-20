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
}

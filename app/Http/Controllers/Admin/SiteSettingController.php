<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index(Request $request)
    {
        $parent_nav = 'item';
        $child_nav = 'site';
        return view("admin.site.index",compact("parent_nav","child_nav"));
    }
}

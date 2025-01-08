<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
    // Here to load data for dashboard 
    return view('admin.home');
     }
}
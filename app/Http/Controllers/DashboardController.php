<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Participant;
use App\Models\Property;
use App\Models\RentalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    // User data
    $totalUsers = Account::count();
    $verifiedUsers = Account::where('verified', 'done')->count();

    // Property data
    $availableProperties = Property::where('status', 'available')->count();
    $bookedProperties = Property::where('status', 'pending')->count();

    // RentalRequest data
    $approvedRental = RentalRequest::where('status', 'approved')->count();
    $pendingRental = RentalRequest::where('status', 'pending')->count();

    // Revenue: Total and This Month
    $totalRevenue = RentalRequest::where('status', 'approved')->sum('total_price');

    $thisMonthRevenue = RentalRequest::where('status', 'approved')
        ->whereMonth('check_in', now()->month)
        ->whereYear('check_in', now()->year)
        ->sum('total_price');

    // Pending payments: Count + Total
    $pendingPayments = RentalRequest::where('status', 'pending')->count();
    $totalPendingAmount = RentalRequest::where('status', 'pending')->sum('total_price');

    return view('admin.home', compact(
        'totalUsers',
        'verifiedUsers',
        'availableProperties',
        'bookedProperties',
        'approvedRental',
        'pendingRental',
        'totalRevenue',
        'thisMonthRevenue',
        'pendingPayments',
        'totalPendingAmount'
    ));
}
}
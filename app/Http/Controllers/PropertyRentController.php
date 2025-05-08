<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\RentalRequest;
use App\Models\Property;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyRentController extends Controller
{
    /**
     * Store a new rental request
     */
    public function storeRentalRequest(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'duration' => 'required|integer|min:1',
            'guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Check if logged-in account is a buyer
        $user = Auth::user(); // assuming you're using the `accounts` table for authentication
        if ($user->user_type !== 'buyer') {
            return back()->with('error', 'Only buyers can place rental requests.');
        }

        // Check if property is available
        $property = Property::findOrFail($validated['property_id']);
        if ($property->status !== 'available') {
            return back()->with('error', 'This property is not available for rent.');
        }

        // Create the rental request
        RentalRequest::create([
            'tenant_id' => Auth::id(),
            'property_id' => $validated['property_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'duration' => $validated['duration'],
            'guests' => $validated['guests'],
            'total_price' => $validated['total_price'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Rental request submitted successfully!');
    }

    /**
     * Show all rental requests for the authenticated user
     */
    public function myRentalRequests()
    {
        $user = Auth::user();
        
        // For tenants (buyers) – only pending requests
        $requestsAsTenant = RentalRequest::with('property.images')
            ->where('tenant_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->get();
        
        // Fetch tenant names for each request
        foreach ($requestsAsTenant as $request) {
            $tenant = Account::find($request->tenant_id); // Fetch tenant by ID
            $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';
        }
        
        // For landlords (sellers) – only pending requests
        $requestsAsLandlord = RentalRequest::with('tenant')
            ->where('status', 'pending')
            ->whereHas('property', function($query) use ($user) {
                $query->where('account_id', $user->id);
            })
            ->latest()
            ->get();

        // Fetch tenant names for landlord requests
        foreach ($requestsAsLandlord as $request) {
            $tenant = \App\Models\Account::find($request->tenant_id); // Fetch tenant by ID
            $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';
        }
        
        // Return the view with the additional tenant name data
        return view('vadama.requestproperty', compact('requestsAsTenant', 'requestsAsLandlord'));
    }


    public function requestapproved($id)
    {
        $account = Property::find($id);
        if ($account) {
            $account->status = 'pending';
            $account->save();
        }
        $rentalRequest = RentalRequest::where('property_id', $id)->first();
        if ($rentalRequest) {
            $rentalRequest->status = 'approved';
            $rentalRequest->save();
        }

        return redirect()->back()->with('success', 'Account status updated to pending.');
    }

    public function requestcancel($id)
    {
        $rentalRequest = RentalRequest::where('property_id', $id)->first();
        if ($rentalRequest) {
            $rentalRequest->status = 'rejected';
            $rentalRequest->save();
        }

        return redirect()->back()->with('success', 'Rental request status updated to rejected.');
    }

    /**
     * Update rental request status (approve/reject/cancel)
     */
    public function updateRentalRequest(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,canceled',
        ]);
        
        $rentalRequest = RentalRequest::findOrFail($id);
        
        // Authorization - only owner of property or requester can update
        if ($rentalRequest->tenant_id !== Auth::id() && 
            $rentalRequest->property->account_id !== Auth::id()) {
            abort(403);
        }
        
        // Update status
        $rentalRequest->update(['status' => $validated['status']]);
        
        // If approved, update property status
        if ($validated['status'] === 'approved') {
            $rentalRequest->property->update(['status' => 'pending']);
        }
        
        return back()->with('success', 'Rental request updated successfully!');
    }

    /**
     * Process payment for a rental request
     */
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'rental_request_id' => 'required|exists:rental_requests,id',
            'payment_method' => 'required|in:esewa,phone_pay,khalti',
            'amount' => 'required|numeric|min:0',
        ]);
        
        $rentalRequest = RentalRequest::findOrFail($validated['rental_request_id']);
        
        // Verify user owns this rental request
        if ($rentalRequest->tenant_id !== Auth::id()) {
            abort(403);
        }
        
        // Create payment record
        $payment = Payment::create([
            'account_id' => Auth::id(),
            'rental_request_id' => $rentalRequest->id,
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'payment_status' => 'pending',
            'payment_id' => uniqid(), // This would come from payment gateway in real implementation
        ]);
        
        // Here you would typically integrate with the payment gateway
        // For now, we'll simulate a successful payment
        $payment->update(['payment_status' => 'completed']);
        $rentalRequest->update(['status' => 'approved']);
        $rentalRequest->property->update(['status' => 'rented']);
        
        return redirect()->route('my-rental-requests')
            ->with('success', 'Payment processed successfully! Rental confirmed.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\RentalRequest;
use App\Models\Property;
use Illuminate\Support\Facades\Crypt;
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
    // public function myRentalRequests()
    // {
    //     $user = Auth::user();
        
    //     // For tenants (buyers) – only pending requests
    //     $requestsAsTenant = RentalRequest::with('property.images')
    //         ->where('tenant_id', $user->id)
    //         ->where('status', 'pending')
    //         ->latest()
    //         ->get();
        
    //     // Fetch tenant names for each request
    //     foreach ($requestsAsTenant as $request) {
    //         $tenant = Account::find($request->tenant_id); // Fetch tenant by ID
    //         $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';
    //     }
        
    //     // For landlords (sellers) – only pending requests
    //     $requestsAsLandlord = RentalRequest::with('tenant')
    //         ->where('status', 'pending')
    //         ->whereHas('property', function($query) use ($user) {
    //             $query->where('account_id', $user->id);
    //         })
    //         ->latest()
    //         ->get();

    //     // Fetch tenant names for landlord requests
    //     foreach ($requestsAsLandlord as $request) {
    //         $tenant = Account::find($request->tenant_id); // Fetch tenant by ID
    //         $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';
    //     }
        
        
    //     // Return the view with the additional tenant name data
    //     return view('vadama.requestproperty', compact('requestsAsTenant', 'requestsAsLandlord'));
    // }

    

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


//     public function myRentalRequests()
// {
//     $user = Auth::user();

//     // Tenant side
//     $requestsAsTenant = RentalRequest::with('property.images')
//         ->where('tenant_id', $user->id)
//         ->where('status', 'pending')
//         ->latest()
//         ->get();

//     foreach ($requestsAsTenant as $request) {
//         $tenant = Account::find($request->tenant_id);
//         $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';

//         $paymentFields = $this->generateEsewaPaymentFields($request);
//         $request->uuid = $paymentFields['uuid'];
//         $request->signed_field_names = $paymentFields['signed_field_names'];
//         $request->signature = $paymentFields['signature'];
//     }

//     // Landlord side
//     $requestsAsLandlord = RentalRequest::with('tenant')
//         ->where('status', 'pending')
//         ->whereHas('property', function($query) use ($user) {
//             $query->where('account_id', $user->id);
//         })
//         ->latest()
//         ->get();

//     foreach ($requestsAsLandlord as $request) {
//         $tenant = Account::find($request->tenant_id);
//         $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';

//         $paymentFields = $this->generateEsewaPaymentFields($request);
//         $request->uuid = $paymentFields['uuid'];
//         $request->signed_field_names = $paymentFields['signed_field_names'];
//         $request->signature = $paymentFields['signature'];
//     }
//     return view('vadama.confirmrequestpayment', compact('requestsAsTenant', 'requestsAsLandlord'));
// }
   
    public function paymentsuccess(Request $request)
    {
        // You need a way to identify which rental request to update
        $rentalRequestId = $request->query('request_id'); // or use session/auth if you pass it differently

        $rentalRequest = RentalRequest::find($rentalRequestId);
        if ($rentalRequest) {
            $rentalRequest->payment = 'Paid';
            $rentalRequest->save();
            return redirect()->back()->with('success', 'Congratulations! Payment successful.');
        }

        return redirect()->back()->with('error', 'Rental request not found.');
    }

    public function paymentfail(Request $request)
    {
        return redirect()->back()->with('error', 'Payment failed. Please try again.');
    }

    public function myConfirmRequests()
{
    $user = Auth::user();

    // Fetch approved requests for the tenant
    $approvedRequests = RentalRequest::with(['property.images'])
        ->where('tenant_id', $user->id)
        ->where('status', 'approved')
        ->latest()
        ->get();

    foreach ($approvedRequests as $request) {
        $tenant = Account::find($request->tenant_id);
        $request->tenant_name = $tenant ? $tenant->first_name . ' ' . $tenant->last_name : 'N/A';
        // Generate eSewa payment fields
        $paymentFields = $this->generateEsewaPaymentFields($request);
        $request->uuid = $paymentFields['uuid'];
        $request->signed_field_names = $paymentFields['signed_field_names'];
        $request->signature = $paymentFields['signature'];
    }
   

    return view('vadama.confirmrequestpayment', compact('approvedRequests'));
}

private function generateEsewaPaymentFields($rentalRequest)
{
    $secretKey = "8gBm/:&EnhH.1/q";
    $uuid = $this->generateShortUuid(12); // Generate UUID
    $totalAmount = $rentalRequest->total_price ;
    $productCode = "EPAYTEST";

    $signedFields = "total_amount,transaction_uuid,product_code";

    $data = "total_amount=$totalAmount,transaction_uuid=$uuid,product_code=$productCode";

    $signature = base64_encode(hash_hmac('sha256', $data, $secretKey, true));

    return [
        'uuid' => $uuid,
        'signed_field_names' => $signedFields,
        'signature' => $signature
    ];
    
}


private function generateShortUuid($length = 12)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}


}
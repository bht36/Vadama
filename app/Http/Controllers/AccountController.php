<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function user_info_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Add user_type to credentials
        $credentials['user_type'] = 'buyer';

        if (Auth::guard('account')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials or not a buyer!']);
    }

    
    public function user_info_logout(Request $request)
    {
        Auth::guard('account')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function user_info_store(Request $request)
    {  
        // Validate the incoming data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:accounts,username', // Ensures username is unique
            'phone_number' => 'required|string|regex:/^\d{7,15}$/', // Only digits, 7 to 15 characters long
            'email' => 'required|email|max:255|unique:accounts,email', // Ensures valid email and uniqueness
            'password' => 'required|string|min:8|confirmed', // Enforces strong password rule
        ]);
      
        // Create a new Account record using the create method
        Account::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Proper Laravel hashing
        ]);

        // Redirect to a specific page after successful registration
        return view('vadama.login')->with('success', 'Account created successfully!');
    }

    // AccountController.php
    public function accountProfile()
    {
        // Get the authenticated user
        $user = Auth::guard('account')->user();
        
        // Pass the user data to the view
        return view('vadama.accountprofile', ['user' => $user]);
    }


    public function editprofile()
    {
        $user = Auth::guard('account')->user();
        
        // Pass the user data to the view
        return view('vadama.editprofile', ['user' => $user]);
    }

    public function update(Request $request, $id)
{
    // Find the account by ID
    $account = Account::findOrFail($id);
    // dd($request);
    // Validate incoming request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'username' => 'required|string|max:255|unique:accounts,username,' . $account->id,  // Ensure username is unique except for the current account
        'phone_number' => 'required|string|regex:/^\d{7,15}$/',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'citizenship_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
    ]);
   

    // Get the authenticated user (optional, depends on your authorization logic)
    $user = Auth::guard('account')->user();

    // Ensure the user is authorized to update this account (if needed)
    if ($user->id !== (int) $id) {
        return redirect()->route('accountprofile')->with('error', 'Unauthorized action');
    }
    // Handle profile picture upload if available
    $profile_picture = $account->profile_picture; // Keep existing profile picture if no new image is uploaded
    if ($request->hasFile('profile_picture')) {
        // Remove old profile picture if it exists
        if (File::exists(public_path('storage/uploads/profile_pictures/' . $profile_picture))) {
            File::delete(public_path('storage/uploads/profile_pictures/' . $profile_picture));
        }

        // Upload new profile picture
        $profile_picture_file = $request->file('profile_picture');
        $filename_to_store = time() . '_' . $profile_picture_file->getClientOriginalName();
        $path = public_path('storage/uploads/profile_pictures/');

        // Ensure the directory exists
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // Move the uploaded file to the destination folder
        $profile_picture_file->move($path, $filename_to_store);
        $profile_picture = $filename_to_store;
    }

    // Update account details
    $account->update([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'username' => $validatedData['username'],
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone_number'],
        'profile_picture' => $profile_picture, // Update profile_picture with the new or existing one
    ]);

    // Redirect back to profile page with success message
    return redirect()->route('accountprofile')->with('success', 'Profile updated successfully!');
}
    public function dashboard()
    {
        return view('vadama.dashboard');
    }
    public function leaseProperty()
    {
        return view('vadama.leaseproperty');
    }
    public function login_seller()
    {
        return view('vadama.login_seller');
    }
    public function login_seller_account(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credentials['user_type'] = 'seller';

        if (Auth::guard('account')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('leaseproperty')->with('success', 'Seller logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials or not a seller!']);
    }

    public function seller_info_store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:accounts,username', // Ensures username is unique
            'phone_number' => 'required|string|regex:/^\d{7,15}$/', // Only digits, 7 to 15 characters long
            'email' => 'required|email|max:255|unique:accounts,email', // Ensures valid email and uniqueness
            'password' => 'required|string|min:8|confirmed', // Enforces strong password rule
        ]);
      
        // Create a new Account record using the create method
        Account::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'],
            'user_type' =>  'seller',
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Proper Laravel hashing
        ]);

        // Redirect to a specific page after successful registration
        return view('vadama.login_seller');
    }
    public function register_seller()
    {
        return view('vadama.signup_seller');
    }
public function property_upload(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255|unique:properties,title',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric', // Changed from price_per_month to price
        'property_type' => 'required|string|in:room,apartment,house', // Changed from type to property_type
        'guests' => 'required|integer|min:1|max:8',
        'bedrooms' => 'required|integer|min:1|max:5',
        'beds' => 'required|integer|min:1|max:6',
        'baths' => 'required|numeric|min:1|max:4',
        'amenities' => 'nullable|array',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:5120', // Increased to 5MB as per your form
    ]);
    // dd($validatedData);
    // Create Property
    $property = Property::create([
        'account_id' => Auth::id(),
        'title' => $validatedData['title'],
        'location' => $validatedData['location'],
        'description' => $validatedData['description'],
        'price_per_month' => $validatedData['price'], // Map price to price_per_month
        'type' => $validatedData['property_type'], // Map property_type to type
        'guest' => $validatedData['guests'],
        'bedroom' => $validatedData['bedrooms'],
        'bed' => $validatedData['beds'],
        'bathroom' => $validatedData['baths'],
        'amenities' => json_encode($validatedData['amenities'] ?? []),
        'status' => 'available',
    ]);
    // Handle image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/uploads/properties/images/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $image->move($path, $filename);

            PropertyImage::create([
                'property_id' => $property->id,
                'image_path' => $filename,
            ]);
        }
    }

    return redirect()->route('index')->with('success', 'Property uploaded successfully!');
}
    public function view_leaseproperty(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
    
        // Base query: only selecting properties that belong to the logged-in user
        $query = Property::where('account_id', $user->id);
    
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->name . '%');
        }
    
        if ($request->filled('slug')) {
            $query->where('slug', 'like', '%' . $request->slug . '%');
        }
    
        // Fetch properties with related images and account (eager loading), only available ones
        $properties = $query->with(['images', 'account'])
                            ->where('status', 'available')
                            ->latest()
                            ->get();
    
        return view('vadama.rental_list', compact('properties'));
    }
    
public function property_edit($id)
{
    // Get the currently authenticated seller
    $user = Auth::guard('account')->user();

    // Fetch the specific property for this seller
    $property = Property::with('images')
        ->where('account_id', $user->id)
        ->where('id', $id)
        ->firstOrFail(); // Only get one property

    return view('vadama.edit_rental_list', compact('property'));
}
 

public function property_update(Request $request, $id)
{ 
    $property = Property::findOrFail($id);

    // Validate the updated data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'price_per_month' => 'required|numeric',
        'type' => 'nullable|string|max:255',
        'checkin_time' => 'nullable',
        'checkout_time' => 'nullable',
        'key_points' => 'nullable|string|max:1000',
        'tags' => 'nullable|string|max:500',
    ]);

    // Only allow the owner (seller) to update
    if ($property->account_id !== Auth::id()) {
        return back()->with('error', 'Unauthorized action!');
    }

    // Update the property
    $property->update($validatedData);

    return redirect()->route('view_leaseproperty')->with('success', 'Property uploaded successfully!');
}

public function property_destroy($id)
{
    $property = Property::findOrFail($id);

    // Only allow the owner (seller) to delete
    if ($property->account_id !== Auth::id()) {
        return back()->with('error', 'Unauthorized action!');
    }

    // Delete related images
    foreach ($property->images as $image) {
        $imagePath = public_path('storage/uploads/properties/images/' . $image->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $image->delete();
    }

    // Delete the property
    $property->delete();

    return back()->with('success', 'Property deleted successfully!');
}


}
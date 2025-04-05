<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
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

        if (Auth::guard('account')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials!']);
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

        // Validate incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255|unique:accounts,username,' . $account->id,  // Ensure username is unique except for the current account
            'phone_number' => 'required|string|regex:/^\d{7,15}$/',
        ]);

        // Get the authenticated user (optional, depends on your authorization logic)
        $user = Auth::guard('account')->user();

        // Ensure the user is authorized to update this account (if needed)
        if ($user->id !== (int) $id) {
            return redirect()->route('accountprofile')->with('error', 'Unauthorized action');
        }

        // Update account details
        $account->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
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
}

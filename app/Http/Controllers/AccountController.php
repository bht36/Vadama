<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function user_info_login(Request $request){
        
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
            'password' => bcrypt($validatedData['password']), // Hash password
        ]);

        // Redirect to a specific page after successful registration
        return view('vadama.login')->with('success', 'Account created successfully!');
    }
}

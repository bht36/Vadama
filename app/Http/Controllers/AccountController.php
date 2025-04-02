<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function user_info_login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Attempt authentication using Laravel's built-in system
        if (Auth::attempt($credentials)) {
            // dd(Auth::user());
            $request->session()->regenerate();  // Important security measure
    
            // Store user details in session (optional if using Auth facade elsewhere)
            session(['user' => [
                'id' => Auth::id(),
                'name' => Auth::user()->username,
                'email' => Auth::user()->email
            ]]);
    
            return redirect()->intended(route('login'))->with('success', 'Logged in successfully!');
        }
    
        return back()->withErrors(['email' => 'Invalid credentials!']);
    }

    public function user_info_logout(Request $request){
         Auth::logout();

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
}

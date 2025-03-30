<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnCallback;

class ForgetPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view("auth.forgot-password");
    }

    public function sendResetLink(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        // Store the token in the database (assuming you have a 'password_resets' table)
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $validatedData['email']],
            ['token' => $token, 'created_at' => now()]
        ); // Corrected closing of updateOrInsert()

        // Send the email
        Mail::send("mail.forget-password", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route("password.request")->with('success', 'Password reset link has been sent to your email.');
    }

    public function resetPassword($token)
{
    $resetRequest = DB::table('password_reset_tokens')->where('token', $token)->first();

    if (!$resetRequest) {
        return redirect()->route("password.request")->with("error", "Invalid or expired reset link.");
    }

    return view("auth.reset-password", [
        "token" => $token,
        "email" => $resetRequest->email
    ]);
}
    public function resetPasswordPost(Request $request){
        $request->validate([
            "email"=> "required|email|exists:users",
            "password"=> "required|string|min:6|confirmed",
            "password_confirmation"=> "required",
        ]);
        $updatedPassword = DB::table('password_reset_tokens')->where([
            "email"=> $request->email,
            "token"=> $request->token,
        ])->first();

        if(! $updatedPassword) {
            return redirect()->route("reset.password")->with("error","Invalid");
    }
    User::where("email",$request->email)->update(["password" => Hash::make($request->password)]);

    DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();
    return redirect()->route("admin.login")->with("success", "Password reset successful. Please log in.");
}
}
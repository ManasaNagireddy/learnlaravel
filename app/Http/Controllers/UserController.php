<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login()
    {
        return view('login');
    }
    public function CheckAuth(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if the user exists in the database
        $user = \App\Models\User::where('email', $request->input('email'))->first();

        if ($user && password_verify($request->input('password'), $user->password)) {
            // Authentication passed, redirect to dashboard or home page
            return redirect()->route('home')->with('success', 'Login successful!');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }
    public function Logout()
    {
        // Perform logout logic here (e.g., invalidate session, clear cookies)
        auth()->logout();
       return redirect()->route('login.show')->with('success', 'Logged out successfully!');
    }
    //
}

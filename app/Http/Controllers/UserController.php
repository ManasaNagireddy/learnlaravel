<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

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
        $storedpassword = $user->password;
        // Check if the user exists and the password matches
        if (!$user) {
           return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
          $password =  $request->input('password');
       
        if (Hash::check($password,  $storedpassword )) {
             Auth::login($user); // Laravel handles session & guards
             $request->session()->regenerate();
             Session::put('user', $user);
            // Authentication passed, redirect to dashboard or home page
            return redirect()->route('home')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
        
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        // Store the contact message in the database or send an email
        $contactobject = new \App\Models\Customer();
        $contactobject->name = $request->input('name');
        $contactobject->email = $request->input('email');
        $contactobject->query = $request->input('message');
        $contactobject->created_at = now();
        $contactobject->updated_at = now();
        $contactobject->save();
        // ...
        // For demonstration, we'll just log the message
        \Log::info('Contact message received:', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);
        

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    
    //
}

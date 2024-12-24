<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Import the Controller class
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignUpController extends Controller
{
    // Show the sign-up form
    public function create()
    {
        return view('auth.signup');
    }

    // Handle the form submission and register the user
    public function store(Request $request)
    {
        try {
            // Log the request data
            Log::info('Registration Request Data: ', $request->all());

            // Validate the form data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone_number' => 'required|string|max:20',
                'gender' => 'required|string',
                'status' => 'required|in:student,staff',
                'location' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Create the user
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'],
                'gender' => $validated['gender'],
                'status' => $validated['status'],
                'location' => $validated['location'],
                'password' => Hash::make($validated['password']),
            ]);

            // Log successful registration
            Log::info('User registered successfully: ' . $validated['email']);

            // Redirect to login page with success message
            return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error in registration: ' . $e->getMessage());

            // Return to sign-up form with error message
            return redirect()->back()->with('error', 'Failed to create account. Please try again.');
        }
    }
}
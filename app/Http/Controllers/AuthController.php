<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Add this line

class AuthController extends Controller
{
    // Show the login form for users
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle user login request
// Handle user login request
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Find the user by email
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user) {
        // Check if the user is suspended
        if ($user->is_suspended) {
            return redirect()->route('login')->with([
                'suspended' => 'Your account has been suspended due to: ' . $user->suspend_reason,
            ])->withInput();
        }

        // Verify the password
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials are invalid or you are not allowed to login here.',
    ])->onlyInput('email');
}


    // Handle user logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_suspended) {
            Auth::logout();

            return redirect()->route('login')->with([
                'suspended' => 'Your account has been suspended due to: ' . $user->suspend_reason,
            ]);
        }
    }
}

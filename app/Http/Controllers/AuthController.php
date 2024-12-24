<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form for users
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle user login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the user exists
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && $user->is_suspended) {
            // If the user is suspended, redirect back with a suspension error message
            return back()->withErrors([
                'suspended' => 'Your account has been suspended due to: ' . $user->suspend_reason,
            ]);
        }

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
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

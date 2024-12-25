<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Make sure you have the Item model imported

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Static user info (you can replace this with dynamic data if needed)
        $user = [
            'name' => 'Admin #1',
            'role' => 'Admin'
        ];

        $userItems = Item::where('user_id', auth()->id())
        ->orderBy('updated_at', 'desc')
        ->get();
    
    
          $latestItems = Item::where('user_id', '!=', auth()->id())
          ->orderBy('created_at', 'desc')
          ->take(10)
          ->get();
    

        // Pass the user and latest items to the dashboard view
        return view('dashboard', compact('user', 'latestItems'));
    }

    public function dashboard()
    {
        $notifications = auth()->user()->notifications;

        return view('dashboard', compact('notifications'));
    }
}

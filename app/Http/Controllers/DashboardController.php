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
        // Get the authenticated user
        $user = auth()->user();

        // Fetch items that match the user's location and exclude the user's own items
        $itemsNearYou = Item::where('location', $user->location)
            ->where('user_id', '!=', $user->id) // Exclude items listed by the same user
            ->orderBy('created_at', 'desc') // Order by latest upload
            ->get();

        // Pass the user and items near them to the dashboard view
        return view('dashboard', compact('user', 'itemsNearYou'));
    }

    public function dashboard()
    {
        $notifications = auth()->user()->notifications;

        return view('dashboard', compact('notifications'));
    }
}

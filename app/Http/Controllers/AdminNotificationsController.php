<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminNotification;

class AdminNotificationsController extends Controller
{
    public function index()
    {
        // Fetch notifications for the logged-in user
        $notifications = AdminNotification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Pass the data to the view
        return view('admin.notifications', compact('notifications'));
    }
}

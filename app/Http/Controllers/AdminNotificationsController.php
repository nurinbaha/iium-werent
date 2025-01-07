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

        AdminNotification::where('user_id', auth()->id())
            ->whereNull('read_at') // Only update unread notifications
            ->update(['read_at' => now()]);

        // Pass the data to the view
        return view('admin.notifications', compact('notifications'));
    }

    public function markAsRead()
{
    \App\Models\AdminNotification::where('user_id', auth()->id())
        ->whereNull('read_at')
        ->update(['read_at' => now()]);

    return redirect()->back();
}
}

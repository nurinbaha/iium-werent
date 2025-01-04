<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserReport; // Import the UserReport model
use App\Models\User;

class AdminUserReportsController extends Controller
{
    
    // Display the User Reports Page
    public function index()
    {
        $reportedUsers = UserReport::with(['reportedUser', 'reporter'])->latest()->get();
        return view('admin.user-reports', compact('reportedUsers'));
    }
     

    // View details of a specific reported user
    public function show($user_id)
    {
        $reportedUser = User::findOrFail($user_id);
        $userReports = UserReport::where('reported_user_id', $user_id)->with('reporter')->latest()->get();
        return view('admin.user-report-details', compact('reportedUser', 'userReports'));
    }

    
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReport; // Assuming you have a UserReport model
use Auth;

class UserReportController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reason' => 'required|string|max:255',
        ]);

        // Save the report
        UserReport::create([
            'reported_user_id' => $request->user_id,
            'reported_by' => Auth::id(),
            'reason' => $request->reason,
            'details' => $request->details,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'The user has been reported successfully.');
    }
}

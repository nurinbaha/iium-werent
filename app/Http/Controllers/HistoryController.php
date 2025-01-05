<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; 
use App\Models\User;
use App\Models\RentHistory;
use App\Models\RentOutHistory;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function showRentHistory()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        // Fetch rent history where the current user is the renter
        $rentHistory = RentHistory::where('renter_id', auth()->id())
        ->with(['item'])
        ->orderByRaw("
            CASE 
                WHEN status = 'rented' THEN 1
                WHEN status = 'returned' THEN 2
                WHEN status = 'reviewed' THEN 3
                ELSE 4
            END
        ")
        ->orderBy('created_at', 'desc')
        ->get();
        
        // Fetch rent requests that haven't been reviewed yet
        $unreviewedRequests = RentHistory::where('renter_id', auth()->id())
        ->where('status', 'rented')  // Only the requests that are returned and not reviewed
        ->get();

        // Count the number of notifications for pending reviews
        $rentCount = $unreviewedRequests->count();

        return view('history.rent', compact('rentHistory', 'rentCount'));
    }
    
    public function showRentOutHistory()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        $user = auth()->user();

        $rentOutHistory = RentOutHistory::where('owner_id', auth()->id())
        ->with(['item'])
        ->orderByRaw("
            CASE 
                WHEN status = 'rented' THEN 1
                WHEN status = 'returned' THEN 2
                WHEN status = 'reviewed' THEN 3
                ELSE 4
            END
        ")
        ->orderBy('created_at', 'desc')
        ->get();

         // Fetch approved requests that haven't been reviewed yet
         $approvedRentRequests = RentOutHistory::where('owner_id', $user->id)
         ->where('status', 'rented')  // Only the requests that are rented and not reviewed
         ->get();

        // Count the number of notifications for pending reviews
        $unreviewedCount = $approvedRentRequests->count();
                                        
        return view('history.rentout', compact('rentOutHistory', 'unreviewedCount'));
    }

    public function markAsReturned($id)
    {
        $rentHistory = DB::table('rent_history')->where('id', $id)->first();

        if ($rentHistory->status === 'rented') {
            DB::table('rent_history')
                ->where('id', $id)
                ->update(['status' => 'returned', 'updated_at' => now()]);
        }

        return redirect()->back()->with('success', 'Rent marked as returned.');
    }

    public function markAsReturnedRentOut($id)
    {
        $rentOutHistory = DB::table('rent_out_history')->where('id', $id)->first();

        if ($rentOutHistory->status === 'rented') {
            DB::table('rent_out_history')
                ->where('id', $id)
                ->update(['status' => 'returned', 'updated_at' => now()]);
        }

        return redirect()->back()->with('success', 'Rent out marked as returned.');
    }


}
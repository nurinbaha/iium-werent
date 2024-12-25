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
        
        return view('history.rent', compact('rentHistory'));
    }
    
    public function showRentOutHistory()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

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
                                        
        return view('history.rentout', compact('rentOutHistory'));
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
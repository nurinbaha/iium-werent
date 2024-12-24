<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentHistory;
use App\Models\RentOutHistory;

class ReviewController extends Controller
{
    // Show review form for renter (Rent History)
    public function reviewRentHistory($id)
    {
        $rentHistory = RentHistory::findOrFail($id);

        return view('reviews.rent', compact('rentHistory'));
    }

    // Show review form for owner (Rent Out History)
    public function reviewRentOutHistory($id)
    {
        $rentOutHistory = RentOutHistory::findOrFail($id);

        return view('reviews.rentout', compact('rentOutHistory'));
    }

    public function submitRentReview(Request $request, $id)
    {
        $request->validate([
            'item_review' => 'required|string|max:255',
        ]);

        $rentHistory = RentHistory::findOrFail($id);

        $rentHistory->item_review = $request->item_review;
        $rentHistory->status = 'reviewed';  // Mark as reviewed
        $rentHistory->save();  // Save the changes

        return redirect()->route('rent.history')->with('success', 'Review submitted successfully.');
    }

    public function submitRentOutReview(Request $request, $id)
    {

        $request->validate([
            'renter_review' => 'required|string|max:255',
        ]);

        $rentOutHistory = RentOutHistory::findOrFail($id);

        $rentOutHistory->renter_review = $request->renter_review;
        $rentOutHistory->status = 'reviewed';  // Mark as reviewed
        $rentOutHistory->save();

        return redirect()->route('rentout.history')->with('success', 'Review submitted successfully.');
    }

}

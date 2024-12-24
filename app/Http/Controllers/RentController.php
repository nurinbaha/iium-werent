<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\RentHistory;
use App\Models\RentRequest;
use Illuminate\Support\Facades\DB;


class RentController extends Controller
{


    public function showRentForm($id)
    {
        $item = Item::findOrFail($id);
        return view('items.rent-form', compact('item'));
    }

    public function confirmRent(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $item = Item::findOrFail($id);
        $owner = $item->user; 
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $totalDays = $startDate->diff($endDate)->days;
        $totalPrice = $totalDays * $item->price;


        // Pass data to the confirmation view
        return view('items.rent-confirm', [
            'item' => $item,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $totalDays,
            'total_price' => $totalPrice,
            'final_price' => $totalPrice * 2, // Include deposit
        ]);
    }

    public function submitRent(Request $request, $id)
     {
        $item = Item::findOrFail($id);
        $renter = auth()->user();
        $owner = $item->user;

        // Calculate total days and price
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $totalDays = $startDate->diff($endDate)->days;
        $totalPrice = $totalDays * $item->price;
        $finalPrice = $totalPrice * 2;

        RentRequest::create([
            'user_id' => $renter->id,
            'item_id' => $id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $totalDays,
            'total_price' => $totalPrice,
            'final_price' => $finalPrice,
            'status' => 'pending',
        ]);

            // Store notification data in separate columns
            DB::table('notifications')->insert([
                'message' => $message ?? 'You have a new rent request for your item.', // Use the default message if $message is null
                'user_id' => $renter->id,  
                'owner_id' => $owner->id, 
                'item_id' => $item->id,       // The item's ID
                'start_date' => $startDate,      // The start date of the rent
                'end_date' => $endDate,          // The end date of the rent
                'total_days' => $totalDays,      // The total days of the rent
                'total_price' => $totalPrice,    // The total price without deposit
                'final_price' => $finalPrice,    // The final price with deposit
                'status' => 'pending',           // Set initial status to pending
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        return redirect()->route('dashboard', $id)->with('success', 'Rent confirmed successfully!');
    }

}

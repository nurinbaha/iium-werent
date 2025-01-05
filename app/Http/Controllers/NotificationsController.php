<?php

namespace App\Http\Controllers;

use App\Models\RentRequest;
use App\Models\Notification;
use App\Models\RentNotification;
use App\Models\Item;
use App\Models\User;
use App\Models\RentHistory;
use App\Models\RentOutHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function showNotifications()
    {
    
        // Fetch notifications where the current user is the owner
        $rentOutNotifications = Notification::where('owner_id', auth()->id())
                                        ->where('status', 'pending')
                                        ->get();
    

        return view('notifications.rent_out', compact('rentOutNotifications'));
    }    

    public function showRentNotifications()
    {
        $rentNotifications = RentNotification::where('user_id', auth()->id())
        ->whereIn('status', ['approved', 'declined']) 
        ->get();

        return view('notifications.rent', compact('rentNotifications'));
    }

    public function approveNotification($id)
    { 
        $notification = Notification::findOrFail($id);
        $item = $notification->item;
        $owner = User::find($notification->owner_id);  // The owner of the item
        $renter = User::find($notification->user_id);  // The renter who made the request
        // Update the status of the rent out notification to 'approved'
        $notification->update(['status' => 'approved']);
    
        // Create a new rent notification for the renter
        RentNotification::create([
            'message' => 'Your rent request has been approved.',
            'user_id' => $renter->id, // Send to the renter
            'owner_id' => auth()->id(), // Current logged-in owner
            'item_id' => $notification->item_id,    // The item the renter requested
            'status' => 'approved',    // Status is 'approved' for renter
            'start_date' => $notification->start_date,
            'end_date' => $notification->end_date,
            'total_days' => $notification->total_days,
            'total_price' => $notification->total_price,
            'final_price' => $notification->final_price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         // Store rent history for the renter (user)
            DB::table('rent_history')->insert([
                'owner_id' => $owner->id,
                'renter_id' => $renter->id,
                'item_id' => $item->id,
                'start_date' => $notification->start_date,
                'end_date' => $notification->end_date,
                'status' => 'rented',  // Set status as rented for rent history
                'total_days' => $notification->total_days,
                'total_price' => $notification->total_price,
                'final_price' => $notification->final_price,
                'created_at' => now(),
                'updated_at' => now(),
        ]);

        // Store rent out history for the owner
            DB::table('rent_out_history')->insert([
            'owner_id' => $owner->id,
            'renter_id' => $renter->id,
            'item_id' => $item->id,
            'start_date' => $notification->start_date,
            'end_date' => $notification->end_date,
            'status' => 'rented',  // Set status as rented for rent out history
            'total_days' => $notification->total_days,
            'total_price' => $notification->total_price,
            'final_price' => $notification->final_price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         // Redirect back or show success message
         return redirect()->route('notifications.rent_out')->with('success', 'Rent request approved and renter notified!');
        }
    
    public function declineNotification($id)
        {
            $notification = Notification::findOrFail($id);
            $item = $notification->item;
            $owner = User::find($notification->owner_id);  // The owner of the item
            $renter = User::find($notification->user_id);  // The renter who made the request
        
            // Update the status of the rent out notification to 'declined'
            $notification->update(['status' => 'rejected']);
        
            // Create a new rent notification for the renter
            RentNotification::create([
                'message' => 'Your rent request has been declined.',
                'user_id' => $renter->id, // Send to the renter
                'owner_id' => auth()->id(), // Current logged-in owner
                'item_id' => $notification->item_id,   // The item the renter requested
                'status' => 'declined',    // Status is 'declined' for renter
                'start_date' => $notification->start_date,
                'end_date' => $notification->end_date,
                'total_days' => $notification->total_days,
                'total_price' => $notification->total_price,
                'final_price' => $notification->final_price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        // Redirect back or show error message
        return redirect()->route('notifications.rent_out')->with('error', 'Rent request declined and renter notified!');
    }
    
    public function pendingCount()
    {
        $count = RentNotification::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->count();

        return response()->json(['count' => $count]);
    }

}

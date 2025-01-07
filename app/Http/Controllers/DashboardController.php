<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Make sure you have the Item model imported
use App\Models\Notification;
use App\Models\RentNotification;
use App\Models\RentOutHistory;
use App\Models\RentHistory;
use App\Models\AdminNotification;

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

        $pendingRequestsCount = Notification::where('owner_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $rentNotifications = RentNotification::where('user_id', $user->id)
        ->whereIn('status', ['approved', 'declined'])
        ->pluck('id')
        ->toArray();

        // Fetch viewed notification IDs from session
        $viewedNotifications = session()->get('viewed_notifications', []);
        $unreadCount = count(array_diff($rentNotifications, $viewedNotifications));

         $approvedRentRequests = RentOutHistory::where('owner_id', $user->id)
        ->where('status', 'rented')
        ->get();

         $unreviewedCount = $approvedRentRequests->count();
    
         $unreviewedRequests = RentHistory::where('renter_id', auth()->id())
         ->where('status', 'rented')  // Only the requests that are returned and not reviewed
         ->get();
 
         // Count the number of notifications for pending reviews
         $rentCount = $unreviewedRequests->count();

        // Pass all data to the dashboard view
        return view('dashboard', compact(
            'user',
            'itemsNearYou',
            'pendingRequestsCount',
            'unreadCount',
            'unreviewedCount',
            'rentCount'
        ));
    
    }

  //  public function dashboard()
   // {
        // Fetch user notifications
    //    $notifications = auth()->user()->notifications;
    
        // Fetch admin notifications for the logged-in user that are not yet shown
   //     $adminNotifications = AdminNotification::where('user_id', auth()->id())
   //         ->where('is_shown', false) // Only fetch unseen notifications
   //         ->latest()
   //         ->get();
    
        // Mark admin notifications as shown
        //AdminNotification::whereIn('id', $adminNotifications->pluck('id'))
        //    ->update(['is_shown' => true]);
    
        // Pass both notifications and adminNotifications to the view
       // return view('dashboard', compact('notifications', 'adminNotifications'));
   // }
    
   public function dashboard()
   {
       // Fetch notifications
       $notifications = auth()->user()->notifications;
       
       // Fetch admin notifications
       $adminNotifications = AdminNotification::where('user_id', auth()->id())
           ->latest()
           ->get();
   
       // Pass notifications to the view
       return view('dashboard', compact('notifications', 'adminNotifications'));
   }
   


}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Import base Controller

class ChatController extends Controller
{
    public function index(Request $request, $receiver_id = null)
    {
        $search = $request->input('search');
    
        // Fetch users the current user has messaged
        $messagedUsers = User::whereHas('receivedMessages', function ($query) {
                $query->where('sender_id', auth()->id());
            })
            ->orWhereHas('sentMessages', function ($query) {
                $query->where('receiver_id', auth()->id());
            });
    
        // Add search functionality for partial matches
        if ($search) {
            $messagedUsers->where('name', 'LIKE', '%' . $search . '%');
        }
    
        $messagedUsers = $messagedUsers->distinct()->get();
    
        // Fetch messages if a user is selected
        $messages = null;
        $receiver = null;
    
        if ($receiver_id) {
            // Check if the current user has permission to chat with this receiver
            $allowed = \DB::table('rent_history')
                ->where(function ($query) use ($receiver_id) {
                    $query->where('renter_id', auth()->id())
                          ->where('owner_id', $receiver_id);
                })
                ->orWhere(function ($query) use ($receiver_id) {
                    $query->where('owner_id', auth()->id())
                          ->where('renter_id', $receiver_id);
                })
                ->exists();
    
            if (!$allowed) {
                return redirect()->route('notifications.rent')->withErrors('You are not authorized to chat with this user.');
            }
    
            $receiver = User::findOrFail($receiver_id);
            $messages = Message::where(function ($query) use ($receiver_id) {
                    $query->where('sender_id', auth()->id())
                          ->where('receiver_id', $receiver_id);
                })
                ->orWhere(function ($query) use ($receiver_id) {
                    $query->where('sender_id', $receiver_id)
                          ->where('receiver_id', auth()->id());
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }
    
        return view('chat.index', compact('messagedUsers', 'messages', 'receiver'));
    }
    

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:255',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return back();
    }

    public function proceedToChat($rentNotificationId)
{
    // Find the RentNotification
    $rentNotification = RentNotification::findOrFail($rentNotificationId);

    // Get the renter (user) ID and owner (item owner) ID
    $renterId = $rentNotification->user_id;
    $ownerId = $rentNotification->item->user_id;

    // Determine the chat partner based on the current user
    $chatPartnerId = auth()->id() === $renterId ? $ownerId : $renterId;

    // Redirect to the chat page with the selected chat partner
    return redirect()->route('chat.index', ['receiver_id' => $chatPartnerId]);
}

}

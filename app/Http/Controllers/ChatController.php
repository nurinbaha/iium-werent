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
}

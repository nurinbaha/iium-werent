<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportedItem; // Import the model
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'reason' => 'required|string|max:255',
        ]);
    
        ReportedItem::create([
            'user_id' => Auth::id(),
            'item_id' => $validated['item_id'],
            'reason' => $validated['reason'],
        ]);
    
        // Add success message to session
        return redirect()->back()->with('success', 'Thank you for reporting. Your submission has been sent to the admin for review.');
    }
    
    
}

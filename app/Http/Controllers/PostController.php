<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class PostController extends Controller
{
    // Show the Add Post form
    public function create()
    {
        return view('add-post');
    }

    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validated = $request->validate([
                'item_name' => 'required|string|max:255',
                'item_description' => 'required|string',
                'category' => 'required|string',
                'price' => 'required|numeric',
                'location' => 'required|string',
                'pickup_method' => 'required|string',
                'item_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // Allow multiple images
            ]);

            // Create a new item and save to the database
            $item = Item::create([
                'item_name' => $validated['item_name'],
                'item_description' => $validated['item_description'],
                'category' => $validated['category'],
                'price' => $validated['price'],
                'location' => $validated['location'],
                'pickup_method' => $validated['pickup_method'],
                'user_id' => auth()->id(),
            ]);

            // Save multiple images if provided
            if ($request->hasFile('item_images')) {
                foreach ($request->file('item_images') as $image) {
                    $fileName = $image->store('images/items', 'public');
                    $item->images()->create(['path' => $fileName]);
                }
            }

            // Redirect with success message
            return redirect()->route('dashboard')->with('success', 'Item posted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error saving item: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to post item.');
        }
    }
}

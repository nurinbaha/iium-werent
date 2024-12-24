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
                'item_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            // Log the entire request data for debugging
            \Log::info('Request Data: ', $request->all());
    
            $imageName = 'default.jpg'; // Default image
    
            // Handle file upload if an image is provided
            if ($request->hasFile('item_image')) {
                \Log::info('Image found for upload.');
    
                // Store image in storage/public/images and get the path
                $imageName = $request->file('item_image')->store('images', 'public');
    
                \Log::info('Image uploaded successfully: ' . $imageName);
            } else {
                \Log::info('No image uploaded, using default.');
            }
    
            // Save the item to the database with the logged-in user id
            Item::create([
                'item_name' => $validated['item_name'],
                'item_description' => $validated['item_description'],
                'category' => $validated['category'],
                'price' => $validated['price'],
                'location' => $validated['location'],
                'pickup_method' => $validated['pickup_method'],
                'item_image' => $imageName,
                'user_id' => auth()->id(),
            ]);
    
            // Redirect with success message
            return redirect()->route('dashboard')->with('success', 'Item posted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error saving item: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'Failed to post item.');
        }
    }
    


}

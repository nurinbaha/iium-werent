<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Assuming you have an Item model
use App\Models\User;
use App\Models\ItemImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Wishlist;


class ItemController extends Controller
{
    // Original Method to show item details with wishlist functionality
    public function show($id)
    {
        $item = Item::findOrFail($id);
        
        $isWishlisted = Wishlist::where('user_id', auth()->id())
            ->where('item_id', $id)
            ->exists();

        return view('items.item-details', compact('item', 'isWishlisted'));
    }

    public function edit($id)
    {
        // Fetch the item to edit
        $item = Item::findOrFail($id);

        // Predefined categories
        $categories = [
            'Fashion',
            'Home & Living',
            'Books & Stationeries',
            'Sports Equipment',
            'Mobile Electronics',
            'Free Items',
            'Others',
        ];

        // Predefined locations
        $locations = [
            'Mahallah Zubair',
            'Mahallah Uthman',
            'Mahallah Faruq',
            'Mahallah Bilal',
            'Mahallah Siddiq',
            'Mahallah Salahuddin',
            'Mahallah Aminah',
            'Mahallah Asiah',
            'Mahallah Hafsa',
            'Mahallah Asma',
            'Mahallah Ruqayyah',
            'Mahallah Halimah',
            'ahallah Maryam',
            'Mahallah Nusaibah',
            'Mahallah Sumayyah',
            'ahallah Safiyyah',
        ];

        // Pass the item to the edit view
        return view('items.edit', compact('item', 'categories', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        // Update item details
        $item->update($request->only('item_name', 'item_description', 'price', 'category', 'location'));

        // Remove selected images
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $imageId) {
                $image = ItemImage::findOrFail($imageId); // Use the correct model
                Storage::delete($image->path); // Remove the file from storage
                $image->delete(); // Remove the database record
            }
        }

        // Add new images
        if ($request->hasFile('new_item_images')) {
            foreach ($request->file('new_item_images') as $file) {
                $path = $file->store('items', 'public');
                $item->images()->create(['path' => $path]);
            }
        }

        // Redirect to the item's details page
        return redirect()->route('items.item-details', $item->id)->with('success', 'Item updated successfully.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'location' => 'required|string',
            'item_image.*' => 'nullable|image|max:2048',
        ]);

        $item = Item::create($validated);

        if ($request->hasFile('item_image')) {
            foreach ($request->file('item_image') as $file) {
                $path = $file->store('items', 'public');
                $item->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    // New dedicated show method for item details
    public function itemDetails($id)
    {
        $item = Item::findOrFail($id); // Fetch the item or return 404
        return view('items.item-details', compact('item')); // Return the appropriate view
    }
}

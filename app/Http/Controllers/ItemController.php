<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Assuming you have an Item model
use App\Models\User;

class ItemController extends Controller
{
    // Method to show item details
    public function show($id)
{
    $item = Item::findOrFail($id);
    return view('items.item-details', compact('item'));

    $isWishlisted = Wishlist::where('user_id', auth()->id())
    ->where('item_id', $id)
    ->exists();

return view('item.show', compact('item', 'isWishlisted'));
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

    // Validate input
    $request->validate([
        'item_name' => 'required|string|max:255',
        'item_description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string',
        'location' => 'required|string',
        'item_image' => 'nullable|image|max:2048', // Image upload validation
    ]);

    // Update item details
    $item->item_name = $request->item_name;
    $item->item_description = $request->item_description;
    $item->price = $request->price;
    $item->category = $request->category;
    $item->location = $request->location;

    // Handle image upload if provided
    if ($request->hasFile('item_image')) {
        $imagePath = $request->file('item_image')->store('item_images', 'public');
        $item->item_image = $imagePath;
    }

    $item->save();

    return redirect()->route('items.show', $id)->with('success', 'Item successfully updated!');

}


}





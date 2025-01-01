<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Assuming you have an `Item` model

class PageController extends Controller
{
    public function home() {
        return view('dashboard');
    }

    public function categories() {
        return view('categories');
    }

    public function wishlist() {
        return view('wishlist');
    }

    public function rentHistory() {
        return view('rent-history');
    }

    public function notifications() {
        return view('notifications');
    }

    public function profile() {
        return view('profile');
    }

public function search(Request $request)
{
    // Retrieve search criteria
    $itemName = $request->input('item_name');
    $category = $request->input('category');
    $location = $request->input('location');

    // Build the query
    $query = Item::query();

    $query->where('user_id', '!=', auth()->id());

    if ($itemName) {
        $query->where('item_name', 'LIKE', '%' . $itemName . '%');
    }
    if ($category) {
        $query->where('category', $category);
    }
    if ($location) {
        $query->where('location', $location);
    }

    // Get results
    $results = $query->get();

    // Return results to a new view
    return view('search-results', compact('results'));
}

}

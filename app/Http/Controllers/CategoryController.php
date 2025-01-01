<?php

// CategoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch the latest items
        $latestItems = Item::where('user_id', '!=', auth()->id())
                         -> orderBy('created_at', 'desc')->take(10)
                         ->get();

        // Pass the items to the view
        return view('categories', compact('latestItems'));
    }

    public function show($categoryName)
    {
        $items = Item::where('category', $categoryName)->orderBy('created_at', 'desc')->get();
        return view('category.show', compact('items', 'categoryName'));
    }
    
}

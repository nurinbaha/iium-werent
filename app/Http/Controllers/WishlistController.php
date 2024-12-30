<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Item;

class WishlistController extends Controller
{
    public function index()
    {
        // Fetch the wishlist items with the related item details and sort by creation date
        $wishlistItems = auth()->user()
            ->wishlistItems()
            ->with('item') // Load the associated item details
            ->orderBy('created_at', 'desc') // Sort by the most recent additions
            ->get();
    
        return view('wishlist.index', compact('wishlistItems'));
    }
    
    

    public function add($itemId)
    {
        $user = auth()->user();
        $item = Item::findOrFail($itemId);

        if ($user->wishlistItems()->where('item_id', $item->id)->exists()) {
            return redirect()->back()->with('message', 'This item is already in your wishlist.');
        }

        $user->wishlistItems()->attach($item->id);

        return redirect()->back()->with('message', 'Item successfully added to your wishlist!');
    }

    /*public function remove($itemId)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
                            ->where('item_id', $itemId)
                            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['success' => true, 'message' => 'Item removed from wishlist.']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found in wishlist.']);
    }*/
    
    public function remove($itemid)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
                            ->where('item_id', $itemid) // Match by wishlist ID
                            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->route('wishlist.index')->with('success', 'Item removed successfully!');
        }

        return redirect()->route('wishlist.index')->with('error', 'Item not found in wishlist.');
    }

    /*public function remove($itemId)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
                            ->where('item_id', $itemId)
                            ->first();

                            dd($itemId);

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Item removed from wishlist.');
        }

        return redirect()->back()->with('error', 'Item not found in wishlist.');
    }*/

    public function toggle(Item $item)
    {
        $userId = auth()->id();

        $wishlist = Wishlist::where('user_id', $userId)->where('item_id', $item->id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Item removed from wishlist.');
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'item_id' => $item->id,
            ]);
            return back()->with('success', 'Item added to wishlist.');
        }
    }
}
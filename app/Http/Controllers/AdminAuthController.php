<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item; // Import the Item model
use App\Models\DeletedItem; // Correctly import the DeletedItem model
use App\Models\AdminNotification;

class AdminAuthController extends Controller
{
    // Show the login form for admins
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Handle admin login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $admin = User::where('email', $request->email)
        ->where('role', 'admin') // Ensure the role is admin
        ->first();

        // Check if the user exists and is an admin
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::login($admin);
            return redirect()->intended('admin/dashboard'); // Redirect to admin dashboard
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or you are not an admin.',
        ])->onlyInput('email');
    }

    // Handle admin logout
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the admin

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect to user login page after logout
    }

    // Method to fetch latest active users (Separate from login/logout logic)
    public function getLatestActiveUser()
    {
        $latestUsers = DB::table('items')
        ->join('users', 'items.user_id', '=', 'users.id')
        ->select('users.id', 'users.name', 'users.user_image', 'items.updated_at as last_active_at', 'users.faculty')
        ->orderBy('items.updated_at', 'desc')
        ->distinct()
        ->take(5)
        ->get();

        return view('admin.view-users', ['latestUsers' => $latestUsers]);
    }

    public function viewUsers(Request $request)
    {
        // Search functionality
        $query = User::query();
    
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('area')) {
            $query->where('location', $request->area); // assuming 'area' refers to 'location' field
        }
    
        $users = $query->get();
    
        // Fetch the latest active users without duplication
        $latestUsers = DB::table('items')
            ->join('users', 'items.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.user_image', DB::raw('MAX(items.updated_at) as last_active_at'), 'users.location')
            ->groupBy('users.id', 'users.name', 'users.user_image', 'users.location')
            ->orderBy('last_active_at', 'desc')
            ->take(5) // Limit to the latest 5 users
            ->get();
    
        return view('admin.view-users', ['users' => $users, 'latestUsers' => $latestUsers]);
    }

    public function searchUsers(Request $request)
{
    $query = User::query();

    if ($request->filled('name')) {
        $query->where('name', 'LIKE', '%' . $request->name . '%');
    }
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }
    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }

    $users = $query->get();
    return view('admin.users-search', compact('users'));
}

public function searchItems(Request $request)
{
    $query = Item::query();

    if ($request->filled('item_name')) {
        $query->where('item_name', 'LIKE', '%' . $request->item_name . '%');
    }
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }

    $items = $query->get();
    return view('admin.items-search', compact('items'));
}

    
    // Show the Admin Dashboard
    public function showAdminDashboard()
    {
        return view('admin-dashboard');
    }

    public function dashboard()
    {
        // Fetch the latest 5 items, sorted by the latest creation date
        $latestItems = Item::orderBy('created_at', 'desc')->take(5)->get();
    
        // Return the admin dashboard view with the latest items
        return view('admin-dashboard', compact('latestItems'));
    }
    
    public function itemDetails($id)
{
    // Fetch the item by ID
    $item = Item::find($id);

    // Check if the item exists
    if (!$item) {
        abort(404, 'Item not found');
    }

    // Pass the item to the view
    return view('admin.admin-item-details', compact('item'));
}



    public function showItemDetails($id)
    {
        $item = Item::findOrFail($id); // Fetch item by ID
        return view('admin.admin-item-details', compact('item')); // Return the correct view
    }
    
    
    


    public function viewListings(Request $request)
    {
        // Search functionality
        $query = Item::query();
    
        if ($request->has('name')) {
            $query->where('item_name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        if ($request->has('area')) {
            $query->where('location', $request->area);
        }
    
        // Fetch the latest items
        $latestItems = $query->orderBy('created_at', 'desc')->get();
    
        return view('admin.view-listings', ['latestItems' => $latestItems]);
    }
    

    public function viewUserDetails($id)
    {
        $user = User::findOrFail($id);
        $userItems = Item::where('user_id', $id)->get();
    
        return view('admin.user-details', [
            'user' => $user,
            'userItems' => $userItems,
        ]);
    }

    public function viewItemDetails($id)
    {
        // Fetch the item from the database using the ID
        $item = Item::findOrFail($id);
    
        // Return the admin item details view
        return view('admin.admin-item-details', ['item' => $item]);
    }

    public function deleteItem(Request $request, $id)
    {
        try {
            $request->validate([
                'delete_reason' => 'required|string',
            ]);
    
            $item = Item::findOrFail($id);
    
            // Add an admin notification for the user
            AdminNotification::create([
                'user_id' => $item->user_id,
                'item_name' => $item->item_name,
                'reason' => $request->delete_reason,
                'deleted_by' => auth()->id(), // Admin's ID
            ]);
    
            // Insert data into the deleted_items table
            DeletedItem::create([
                'item_id' => $item->id,
                'item_name' => $item->item_name,
                'item_description' => $item->item_description,
                'category' => $item->category,
                'price' => $item->price,
                'location' => $item->location,
                'pickup_method' => $item->pickup_method,
                'item_image' => $item->item_image,
                'deleted_by' => auth()->id(), // Admin's ID
                'reason' => $request->delete_reason,
            ]);
    
            // Delete the item from the items table
            $item->delete();
    
            return redirect()->route('admin.view-listings')->with('success', 'Item deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting item: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete the item.');
        }
    }
    

    public function suspendUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->is_suspended = true;
            $user->suspend_reason = $request->suspend_reason; // Add the reason
            $user->save();

            \Log::info('User suspended successfully.', ['user_id' => $id]);
    
            return redirect()->back()->with('success', 'User has been suspended successfully.');
        } catch (\Exception $e) {

            \Log::error('Error suspending user: ' . $e->getMessage()); 

            return redirect()->back()->with('error', 'Failed to suspend the user.');
        }
    }
    

    
    public function unsuspendUser($id)
    {
        try {
            // Fetch the user
            $user = User::findOrFail($id);
    
            // Update the user's suspension status
            $user->is_suspended = false;
            $user->suspend_reason = null; // Clear any previous suspension reason
            $user->save();
    
            // Log the unsuspension
            \Log::info('User unsuspended', ['user_id' => $id]);
    
            // Redirect back with a success message
            return redirect()->route('admin.user.details', ['id' => $id])->with('success', 'User unsuspended successfully.');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error unsuspending user: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to unsuspend the user.');
        }
    }
    

    

}

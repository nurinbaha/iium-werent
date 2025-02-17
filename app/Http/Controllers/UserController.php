<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item; // Import the Item model
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\RentHistory;
use App\Models\RentOutHistory;

class UserController extends Controller
{
    // Display the profile page
    public function profile(Request $request)
    {
        $user = Auth::user();
        $userItems = Item::where('user_id', $user->id)->get();
        
        // Check for the 'edit' query parameter
        $isEditMode = $request->query('edit') === 'true';

        $rentHistory = RentHistory::where('renter_id', $user->id)
        ->with('item')  // Assuming you have an item relationship
        ->get();

        return view('profile', [
            'user' => $user,
            'userItems' => $userItems,
            'isEditMode' => $isEditMode,
            'rentHistory' => $rentHistory
        ]);
    }

    public function ownerProfile($user_id)
    {
        // Fetch the owner by user_id
        $owner = User::findOrFail($user_id);

        // Fetch the items belonging to the owner
        $ownerItems = Item::where('user_id', $owner->id)->get();

        // Pass owner and ownerItems to the view
        return view('owner-profile', [
            'owner' => $owner,
            'ownerItems' => $ownerItems
        ]);
    }

    public function updateProfileImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Check if a new image is uploaded
        if ($request->hasFile('user_image')) {
            // Delete the old profile picture if it exists
            if ($user->user_image && Storage::exists('public/' . $user->user_image)) {
                Storage::delete('public/' . $user->user_image);
            }

            // Store the new image in storage/app/public/profiles
            $fileName = time() . '.' . $request->file('user_image')->extension();
            $filePath = $request->file('user_image')->storeAs('profiles', $fileName, 'public');

            // Update user's profile picture path
            $user->user_image = $filePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }

    public function edit()
    {
        $user = Auth::user();

        return view('profile', [
            'user' => $user,
            'isEditMode' => true, // Set edit mode to true
        ]);
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'location' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
        ]);

        // Update the user details
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'status' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'location' => $request->location,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id); // Fetch user by ID
        $userItems = Item::where('user_id', $id)->get()
                            ->orderBy('created_at', 'desc')
                            ->get();
        $rentHistory = RentHistory::where('user_id', $user->id)
                                    ->with('item')  // Assuming you have an item relationship
                                    ->get();

        return view('profile', compact('user','userItems','rentHistory')); // Ensure you have the profile view
    
    }

    public function showProfile($id)
    {
        $user = User::findOrFail($id);

        // Fetch reviews from RentHistory for this user
        $reviews = RentOutHistory::with('item') // Load the related item
        ->where('renter_id', $id)
        ->whereNotNull('renter_review')
        ->get();

        return view('renter-profile', compact('user', 'reviews'));
    }


}
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentRequestController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ReviewController;


// Display the sign-up form using the SignUpController
Route::get('/signup', [SignUpController::class, 'create'])->name('signup.create');
Route::post('/signup', [SignUpController::class, 'store'])->name('signup.store');

// Display the login form
Route::get('/login', function () {
    return view('login'); // Make sure login.blade.php exists in resources/views
})->name('login');

// Display the landing page
Route::get('/', function () {
    return view('landing');
});



// Show the login form for users
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle user login request
Route::post('login', [AuthController::class, 'login']);

// Handle user logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Show the login form for admins
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// Handle admin login request
Route::post('admin/login', [AdminAuthController::class, 'login']);

// Handle admin logout
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/admin/login', function () {
    return view('auth.admin-login');
})->name('admin.login');

// Handle the admin login form submission
// Admin Routes
Route::prefix('admin')->group(function () {
    // Admin Authentication
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin Pages
    Route::get('/dashboard', [AdminAuthController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports');
});


Route::get('/admin/dashboard', function () {
    return view('admin-dashboard');
})->middleware('auth')->name('admin.dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [PageController::class, 'home'])->name('home');
Route::get('/categories', [PageController::class, 'categories'])->name('categories');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');
Route::get('/rent-history', [PageController::class, 'rentHistory'])->name('rent-history');
Route::get('/notifications', [PageController::class, 'notifications'])->name('notifications');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

// Route to display the Add Post form
Route::get('/posts/add', [PostController::class, 'create'])->name('posts.add');

// Route to store the post data
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/category/{categoryName}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'You have successfully logged out.');
});

//To display item page
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');

Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');

Route::get('/owner/{user_id}', [UserController::class, 'ownerProfile'])->name('owner.profile');

// Define the route for the T&Cs page
Route::get('/terms', [TermsController::class, 'index'])->name('terms');

// Logout Route
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::get('/admin/users', [AdminAuthController::class, 'viewUsers'])->name('admin.users');

Route::get('/admin/listings', function () {
    return view('admin.view-listings');
});

Route::get('/admin/dashboard', [AdminAuthController::class, 'showAdminDashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminAuthController::class, 'viewUsers'])->name('admin.view-users');
Route::get('/admin/listings', [AdminAuthController::class, 'viewListings'])->name('admin.listings');

// Logout Route
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// In your web.php
Route::get('/admin/user/{id}', [AdminAuthController::class, 'viewUserDetails'])->name('admin.user.details');

Route::get('/admin/user/{id}', [AdminAuthController::class, 'viewUserDetails'])->name('admin.user.details');

Route::get('/admin/listings', [AdminAuthController::class, 'viewListings'])->name('admin.view-listings');

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminAuthController::class, 'showAdminDashboard'])->name('admin.dashboard');

// View All Users
Route::get('/admin/users', [AdminAuthController::class, 'viewUsers'])->name('admin.view-users');

// View User Details
Route::get('/admin/user/{id}', [AdminAuthController::class, 'viewUserDetails'])->name('admin.user.details');

// View All Listings
Route::get('/admin/listings', [AdminAuthController::class, 'viewListings'])->name('admin.view-listings');

// View Item Details
Route::get('/admin/item/{id}', [AdminAuthController::class, 'viewItemDetails'])->name('admin.item.details');

// delete item
Route::delete('/admin/items/{id}', [AdminAuthController::class, 'deleteItem'])->name('admin.delete-item');

//suspend user
Route::post('/admin/users/{id}/suspend', [AdminAuthController::class, 'suspendUser'])->name('admin.suspend-user');

//unsuspend user
Route::post('/admin/users/{id}/unsuspend', [AdminAuthController::class, 'unsuspendUser'])->name('admin.unsuspend-user');

Route::get('/admin/user/{id}', [AdminAuthController::class, 'viewUserDetails'])->name('admin.user.details');
Route::post('/admin/user/suspend/{id}', [AdminAuthController::class, 'suspendUser'])->name('admin.suspend-user');

Route::get('/admin/item/{id}', [AdminAuthController::class, 'showItemDetails'])->name('admin.item.details');

Route::middleware(['auth', 'check.suspension'])->group(function () {
    // Your authenticated routes
});

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

//Search bar
Route::get('/search', [PageController::class, 'search'])->name('search');

// admin search bar
// Users Search
Route::get('/admin/search-users', [AdminAuthController::class, 'searchUsers'])->name('admin.search-users');

// Items Search
Route::get('/admin/search-items', [AdminAuthController::class, 'searchItems'])->name('admin.search-items');

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/admin-item-details/{id}', [AdminAuthController::class, 'itemDetails'])->name('admin.item.details');

Route::delete('/admin/delete-item/{id}', [AdminAuthController::class, 'deleteItem'])->name('admin.delete-item');

// Wishlist
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
});
    
//Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
//Route::post('/wishlist/toggle/{item}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
//Route::middleware('auth')->group(function () {
    //Route::delete('/wishlist/remove/{itemId}', [WishlistController::class, 'remove'])->name('wishlist.remove');
//});

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/toggle/{item}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::delete('/wishlist/remove/{itemId}', [WishlistController::class, 'remove'])->name('wishlist.remove');


Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit')->middleware('auth');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update')->middleware('auth');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');

//item report
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

//admin report
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports');
    Route::get('/reports/{item_id}', [AdminReportController::class, 'show'])->name('admin.report.details');
});

//Chat
Route::middleware('auth')->group(function () {
    Route::get('/chat/{receiver_id?}', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});


// Edit Profile Page
Route::post('/profile/update-image', [UserController::class, 'updateProfileImage'])->name('profile.updateImage');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index')->middleware('auth');
Route::get('/notifications/mark-as-read/{id}', [NotificationsController::class, 'markAsRead'])->name('notifications.markAsRead');

// Routes for approving and declining rent requests
Route::post('/rent/approve/{id}', [RentRequestController::class, 'approve'])->name('rent.approve');
Route::post('/rent/decline/{id}', [RentRequestController::class, 'decline'])->name('rent.decline');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.profile');

Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit')->middleware('auth');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update')->middleware('auth');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');

Route::get('/item/{id}/rent', [RentController::class, 'showRentForm'])->name('item.rent.form');
Route::post('/item/{id}/rent/confirm', [RentController::class, 'confirmRent'])->name('item.rent.confirm');
Route::post('/item/{id}/rent/submit', [RentController::class, 'submitRent'])->name('item.rent.submit');

Route::get('/rent-notifications', [NotificationsController::class, 'showRentNotifications'])->name('notifications.rent');
Route::get('/rent-out-notifications', [NotificationsController::class, 'showNotifications'])->name('notifications.rent_out');
Route::post('/notifications/{id}/approve', [NotificationsController::class, 'approveNotification'])->name('notifications.approve');
Route::post('/notifications/{id}/decline', [NotificationsController::class, 'declineNotification'])->name('notifications.decline');
// Route to handle Proceed to Chat action
Route::get('/chat/proceed/{rentNotification}', [ChatController::class, 'proceedToChat'])->name('chat.proceed');

Route::get('/rent-history', [HistoryController::class, 'showRentHistory'])->name('rent.history');
Route::get('/rent-out-history', [HistoryController::class, 'showRentOutHistory'])->name('rentout.history');

Route::patch('/history/mark-returned/{id}', [HistoryController::class, 'markAsReturned'])->name('history.markReturned');
Route::patch('/rent-out-history/mark-returned/{id}', [HistoryController::class, 'markAsReturnedRentOut'])->name('rentOutHistory.markReturned');

// Review routes for rent history (renter reviewing owner and item)
Route::get('/history/review/{id}', [ReviewController::class, 'reviewRentHistory'])->name('history.review');

// Review routes for rent-out history (owner reviewing renter)
Route::get('/rent-out-history/review/{id}', [ReviewController::class, 'reviewRentOutHistory'])->name('rentOutHistory.review');

Route::post('/history/submit-review/{id}', [ReviewController::class, 'submitRentReview'])->name('history.submitReview');
Route::post('/rent-out-history/submit-review/{id}', [ReviewController::class, 'submitRentOutReview'])->name('rentOutHistory.submitReview');

Route::get('/user/{id}/profile', [UserController::class, 'showProfile'])->name('user.profile');

Route::get('/terms-and-conditions', function () {
    return view('terms');
})->name('terms');




















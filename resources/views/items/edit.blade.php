
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Edit Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Sidebar Styles */
        .sidebar h2 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 30px;
            margin-top: 0px;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
        }

        .sidebar ul li {
    padding: 5px 20px; /* Reduced padding */
    margin-bottom: 5px; /* Adjust the margin to reduce space between items */
}

.sidebar ul li a {
    font-size: 16px; /* You can also adjust the font size if needed */
    color: #ffffff;
    text-decoration: none;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    margin-right: 10px;
}

.sidebar ul li a:hover {
    background-color: #1f2529;
    border-radius: 4px;
}


        .sidebar ul li a:hover i {
            color: #0dcaf0; /* Icon color on hover */
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 40px;
            padding: 20px;
            min-height: 100vh;
            align-items: center;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 180px; /* Adjust the sidebar width */
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #222;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); 3c75ba
        }

        /* Header Styling */
        .header {
    background-color: #3c75ba;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between; /* Adjust the elements to be spread apart */
    align-items: center;
    width: 100%;
    height: 40px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
    border-bottom: none;
}

.header-title h2 {
    color: white; /* Set the text color */
    margin: 0;
    font-size: 1.4rem; /* Adjust the size as needed */
    font-weight: bold;
    margin-left: 10px; /* Adjust this margin to control the left spacing */
}


        /* Adjust the Add Post Button */
        .header .add-post-btn a {
            color: #ffffff;
            background-color: #f1c40f;
            font-size: 1rem
            padding: 8px 15px;
            border-radius: 10px;
            text-decoration: none;
        }

        .header .add-post-btn a:hover {
            background-color: #0a73a6;
        }

        /* Search Box Styling */

        .search-section {
    background-color: transparent; /* Change to transparent to remove the grey background */
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    margin-top: 0px; /* Adjust this value to create space between the header and the search section */
    display: flex;
    align-items: center;
    justify-content: space-between;
}

        
.search-box {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.search-box input {
    width: 100%;
    max-width: 400px; /* Set a consistent width */
    padding: 10px;
    margin-bottom: 10px; /* Space below the input field */
    border-radius: 5px;
    border: 1px solid #ccc;
}

.category-filters {
    display: flex;
    justify-content: space-between;
    gap: 10px; /* Space between dropdowns */
}

.category-dropdown, .area-dropdown {
    width: 100%;
    max-width: 200px; /* Set a consistent width for the dropdowns */
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.search-btn {
    padding: 10px 20px;
    background-color: #007bff;
    border: none;
    color: white;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 10px;
}

.search-btn:hover {
    background-color: #0056b3;
}


        .categories-section {
            margin-bottom: 20px;
            margin-top: 0px;
        }

        .category-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            margin-right: 0px;
            border-radius: 10px;
            text-decoration: none;
        }

        .category-btn:hover {
            background-color: #0056b3;
        }

        /* Latest Items Section */
        .latest-items-section-dashboard {
            margin-bottom: 30px;
        }

        .item-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .item-card img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            border-radius: 4px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
        }

        /* Remove underline from item links */
        .latest-items-section-dashboard a {
            text-decoration: none;
        }

        .latest-items-section-dashboard a:hover {
            text-decoration: underline;
        }

        /* Flash Message Styling */
        .post-alert {
            padding: 10px;
            border-radius: 5px;
        }

        .post-alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .post-alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Add Post Button Styling */
        .add-post-btn a {
            color: #ffffff;
            background-color: #f1c40f;
            padding: 8px 15px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 1rem;
            display: block; /* Ensure it's a block-level element */
        }

        .add-post-btn {
            margin-right: 0;
            padding: 0; /* Remove any extra padding */
        }

        .add-post-btn a:hover {
            background-color: #0a73a6;
        }

        .header .add-post-btn {
            margin-right: 35px;
        }

        /* Remove underline from item links */
        .latest-items-section-dashboard a {
            text-decoration: none;
        }

        #history-arrow, #notification-arrow {
                    transition: transform 0.3s;
                    margin-left: 10px;
                }

        .rotate-down {
            transform: rotate(180deg);
        }

        .form-control {
            box-sizing: border-box;
        }

        .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
textarea,
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #28a745;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

.existing-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.image-container {
    position: relative;
    width: 100px;
    height: 100px;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-container label {
    position: absolute;
    top: 5px;
    right: 5px;
}

input[type="checkbox"] {
    transform: scale(1.2);
}

        .dashboard-container {
    margin-left: 180px; /* Matches the width of the sidebar */
    margin-top: 40px; /* Matches the height of the header */
    padding: 20px; /* Adds internal padding for content */
    min-height: calc(100vh - 40px); /* Adjusts height to fit within the viewport */
    width: calc(100% - 180px); /* Adjusts width to exclude the sidebar */
    box-sizing: border-box; /* Ensures padding is included in width/height calculations */
}

.badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 0.75rem;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
        }

        .badge-grey {
            background-color: #6c757d; /* Grey color */
            color: #fff; /* White text */
        }

    </style>

@if(auth()->check())
    @php
        // Fetch notifications for rental status
        $rentCount = \App\Models\RentHistory::where('renter_id', auth()->id())
            ->where('status', 'rented') // Customize the condition as needed
            ->count();

        // Fetch unreviewed rent out history
        $unreviewedCount = \App\Models\RentOutHistory::where('owner_id', auth()->id())
            ->where('status', 'rented')
            ->count();

        // Fetch unread notifications for rentals
        $unreadCount = \App\Models\RentNotification::where('user_id', auth()->id())
            ->whereIn('status', ['approved', 'declined'])
            ->count();

        // Fetch pending requests count for rent out requests
        $pendingRequestsCount = \App\Models\Notification::where('owner_id', auth()->id())
            ->where('status', 'pending')
            ->count();
        
        $deletedCount = \App\Models\AdminNotification::where('user_id', auth()->id())
                ->whereNull('read_at')
                ->count();
    @endphp
@endif

</head>
<body>
<div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>IIUM WeRent</h2>
            <ul>
            <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ url('/categories') }}"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="{{ url('/wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li><a class="nav-link" href="{{ route('admin.notifications') }}"><i class="fas fa-bell"></i> Notification
                                <span class="badge badge-grey" style="margin-left: 5px;">{{ $deletedCount }}</span>
                            </a>
                <li><a href="#" id="notification-link"><i class="fas fa-tasks"></i> Requests <i class="fas fa-chevron-down" id="notification-arrow"></i></a>
                <ul class="nav" id="notification-sections" style="display: none;">
                        <!-- Rent Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent') }}"> Your Request
                                <span class="badge badge-grey">{{ $unreadCount }}</span>
                            </a>
                        </li>
                        <!-- Rent Out Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent_out') }}">Others Request
                            <span class="badge badge-grey">{{ $pendingRequestsCount }}</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#" id="history-link"><i class="fas fa-history"></i> History <i class="fas fa-chevron-down" id="history-arrow"></i></a>
                <ul class="nav" id="history-sections" style="display: none;">
                    <!-- Rent History Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rent.history') }}">My Rental
                            <span class="badge badge-grey" style="margin-left: 10px;">{{ $rentCount }}</span>
                        </a>
                    </li>
                    <!-- Rent Out Notifications Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rentout.history') }}">My Rent Out
                        @if(isset($unreviewedCount) && $unreviewedCount > 0)
                            <span class="badge badge-grey">{{ $unreviewedCount }}</span>
                        @endif
                        </a>
                    </li>
                </ul>
            </li>
                <li><a href="{{ url('/chat') }}"><i class="fas fa-comments"></i> Chat</a></li>
                <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/terms') }}"><i class="fas fa-file-contract"></i> T&Cs</a></li> <!-- T&Cs Link -->
                <li><a href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
    <div class="header-title">
        <h2>IIUM WeRent</h2>
    </div>
    <button class="add-post-btn">
        <a href="{{ route('posts.add') }}">Add A Post</a>
    </button>
    </div>

<br>

            <!-- Page Title Section -->
            

            <div class="container">
                <h1>Edit Item</h1>

                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" id="nitem_name" name="item_name" class="form-control" value="{{ old('item_name', $item->item_name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="item_description">Description</label>
                        <textarea id="item_description" name="item_description" class="form-control">{{ old('item_description', $item->item_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $item->price) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" 
                                    @if($item->category == $category) selected @endif>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Item Location (Dropdown) -->
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select name="location" id="location" class="form-control" required>
                            <option value="">Select Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location }}" 
                                    @if($item->location == $location) selected @endif>
                                    {{ $location }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Existing Images -->
                     
                    <div class="form-group">
                        <label for="item_images">Remove Existing Images</label>
                        <div class="existing-images">
                            @foreach($item->images as $image)
                                <div class="image-container" style="display: inline-block; margin-right: 10px;">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Item Image" style="width: 100px; height: 100px;">
                                    <label>
                                        <input type="checkbox" name="remove_images[]" value="{{ $image->id }}">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Add New Images -->
                    <div class="form-group">
                        <label for="new_item_images">Add New Images</label>
                        <input type="file" name="new_item_images[]" id="new_item_images" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-success">Update Item</button>
                </form>
            </div>

<script>
     // Function to toggle sections and arrows
     function toggleSection(sectionId, arrowId) {
            var sections = document.getElementById(sectionId);
            var arrow = document.getElementById(arrowId);

            // Toggle the display of the section
            if (sections.style.display === "none" || sections.style.display === "") {
                sections.style.display = "block";
                arrow.classList.add('rotate-down');  // Add rotation when expanded
            } else {
                sections.style.display = "none";
                arrow.classList.remove('rotate-down');  // Remove rotation when collapsed
            }
        }

        // Attach event listeners for both History and Notifications
        document.getElementById('history-link').addEventListener('click', function () {
            toggleSection('history-sections', 'history-arrow');
        });

        document.getElementById('notification-link').addEventListener('click', function () {
            toggleSection('notification-sections', 'notification-arrow');
        });

    </script>

</body>
</html>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - My Rental Status</title>
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
            padding: 40px;
            min-height: 100vh;
            overflow: auto;
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
            width: 300px;
            height: 300px;
            margin-right: 20px;
            border-radius: 4px;
            object-fit: cover;
        }

        .item-details {
            display: flex;
            flex-grow: 1;
            list-style: none; /* Removes the default marker (bullet points) */
            padding: 0; /* Optional: To ensure no extra padding */
            margin: 0; /* Optional: To ensure no extra margin */
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

        .dashboard-container {
            margin-left: 220px; /* Matches the width of the sidebar */
            margin-top: 40px; /* Matches the height of the header */
            background-color: #ffffff; /* Background color for the dashboard */
            width: 100%; /* Adjusts width to exclude the sidebar */
            box-sizing: border-box; /* Ensures padding is included in width/height calculations */
        }

        .container1 {
            margin-left: 0px; /* Matches the width of the sidebar */
            width: 100%;
            max-width: 100%;
            box-sizing: border-box; /* Ensures padding is included in the width/height calculations */
        }

        .no-rent-requests-container {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #history-arrow, #notification-arrow {
                    transition: transform 0.3s;
                    margin-left: 10px;
                }

         .rotate-down {
                    transform: rotate(180deg);
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
                <li><a href="#" id="notification-link"><i class="fas fa-bell"></i> Requests <i class="fas fa-chevron-down" id="notification-arrow"></i></a>
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
                        <a class="nav-link" href="{{ route('notifications.rent') }}">My Rental
                            <span class="badge badge-grey" style="margin-left: 10px;">{{ $unreadCount }}</span>
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

            <!-- Page Title Section -->
            <div class="page-title">
            <h2 style="margin-top: 40px; font-size: 30px; text-align: left; color: black;">
                My Rental Status
            </h2>
            </div>

            <div class="container1">
    @if($rentNotifications->isEmpty())
        <!-- Show the container when there are no rent notifications -->
            <div class="no-rent-requests-container">
                <h3>No Rental Status Available</h3>
                <p>Please check back later for new requests.</p>
                <img src="{{ asset('storage/images/unavailable.png') }}" alt="No items found" 
                    style="width: 300px; height: auto; display: block; margin: 0 auto; border: 0px solid #ddd; border-radius: 10px;">
            </div>
    @else
        <!-- Display the rent notifications -->
        <div class="rent-requests">
            @foreach($rentNotifications as $rentNotification)
                <div class="item-card">
                    <!-- Dynamically handle item images -->
                    @php
                        $imagePath = $rentNotification->item->images->first() 
                                    ? 'storage/' . $rentNotification->item->images->first()->path 
                                    : 'images/default.jpg';
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="{{ $rentNotification->item->item_name }}" class="item-image">
                    <div class="item-details">
                        <li class="list-group-item">
                            <p><strong>Item:</strong> <a href="{{ route('items.show', ['id' => $rentNotification->item->id]) }}">{{ $rentNotification->item->item_name }}</a></p>
                            <p><strong>Message:</strong> {{ $rentNotification->message }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($rentNotification->status) }}</p>
                            <p><strong>Start Date:</strong> {{ $rentNotification->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $rentNotification->end_date }}</p>
                            <p><strong>Total Days:</strong> {{ $rentNotification->total_days }}</p>
                            <p><strong>Total Price (without deposit):</strong> RM {{ number_format($rentNotification->total_price, 2) }}</p>
                            <p><strong>Final Price (with deposit):</strong> RM {{ number_format($rentNotification->final_price, 2) }}</p>
                        </li>
                    </div>
                    <div class="item-actions">
                        @if($rentNotification->status === 'approved')
                            <a href="{{ route('chat.index', ['receiver_id' => $rentNotification->item->user_id]) }}" class="btn btn-primary">Proceed to Chat</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
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

       
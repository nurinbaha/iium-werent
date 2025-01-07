<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>

         /* Sidebar Styling */
         .sidebar {
            width: 180px; 
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #222;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); 3c75ba
        }
       
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
            margin-left: 20px;
            padding: 20px;
            min-height: 100vh;
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
        color: white; 
        margin: 0;
        font-size: 1.4rem; 
        font-weight: bold;
        margin-left: 10px;
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
            text-align: center;
        }

        .search-box input {
            width: 100%;
            box-sizing: border-box;
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
            object-fit: cover;
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
            margin-bottom: 0px;
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

        .no-rent-requests-container {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-container {
            margin-left: 0px; /* Matches the width of the sidebar */
            margin-top: 40px; /* Matches the height of the header */
            background-color: #ffffff; /* Background color for the dashboard */
            min-height: calc(100vh - 40px); /* Adjusts height to fit within the viewport */
            width: calc(100% - 180px); /* Adjusts width to exclude the sidebar */
            box-sizing: border-box; /* Ensures padding is included in width/height calculations */
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

        .container {
        margin: 20px auto;
        max-width: 800px;
    }

    .notification-card {
            display: flex;
            align-items: flex-start;
            background: linear-gradient(135deg, #f9f9f9, #ffffff);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
        }

        .notification-icon {
            font-size: 30px;
            color: #ff7675;
            margin-right: 15px;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .notification-details p {
            margin: 2px 0;
            font-size: 0.9rem;
        }

        .notification-details strong {
            color: #2d98da;
        }

        .notification-footer {
            margin-top: 10px;
            font-size: 0.8rem;
            color: #636e72;
        }

        .no-notifications {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .no-notifications img {
            width: 150px;
            margin: 15px auto;
            display: block;
        }

        .dashboard-container {
            margin-left: 220px; /* Matches the width of the sidebar */
            margin-top: 40px; /* Matches the height of the header */
            background-color: #ffffff; /* Background color for the dashboard */
            min-height: calc(100vh - 40px); /* Adjusts height to fit within the viewport */
            width: calc(100% - 180px); /* Adjusts width to exclude the sidebar */
            box-sizing: border-box; /* Ensures padding is included in width/height calculations */
        }
    </style>
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
            <li><a href="{{ route('admin.notifications') }}"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="{{ url('/chat') }}"><i class="fas fa-comments"></i> Chat</a></li>
            <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="{{ url('/terms') }}"><i class="fas fa-file-contract"></i> T&Cs</a></li>
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
            <div class="add-post-btn">
                <a href="{{ route('posts.add') }}">Add A Post</a>
            </div>
        </div>

        <!-- Page Title Section -->
        <div class="page-title">
            <h2 style="margin-top: 40px; font-size: 30px; text-align: left; color: black;">Notifications</h2>
        </div>

        <!-- Notifications Section -->
        <div class="wishlist-section">
            @if($notifications->isNotEmpty())
                @foreach($notifications as $notification)
                    <div class="notification-card">
                        <div class="notification-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="notification-content">
                            <div class="notification-title">
                                Item Deleted : <strong>{{ $notification->item_name }}</strong>
                            </div>
                            <div class="notification-details">
                                <p>Reason: <strong>{{ $notification->reason }}</strong></p>
                                <p>Deleted by Admin</strong></p>
                                <p>Date: <strong>{{ $notification->created_at->format('d M Y, H:i') }}</strong></p>
                            </div>
                            <div class="notification-footer">
                                If you have concerns, please contact support or the admin team.
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-rent-requests-container">
                                    <h3>No notifications available</h3>
                                    <p>Please come and check again soon !</p>
                                    <img src="{{ asset('storage/images/notification.png') }}" alt="No items found" 
                                        style="width: 300px; height: auto; display: block; margin: 0 auto; border: 0px solid #ddd; border-radius: 10px;">
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
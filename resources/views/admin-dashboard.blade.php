<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Sidebar Styles */
        .sidebar {
            width: 180px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #222;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
            padding: 5px 20px;
            margin-bottom: 5px;
        }

        .sidebar ul li a {
            font-size: 16px;
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
            color: #0dcaf0;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 40px;
            margin-top: 0px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Header Styling */
        .header {
            background-color: #3c75ba;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 40px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            border-bottom: none;
        }

        .header h1 {
            color: white;
            margin: 0;
            font-size: 1.4rem;
            font-weight: bold;
            margin-left: 10px;
        }

        .admin-dashboard {
            text-align: center;
            padding: 20px;
            margin-top: 10px;
        }

        .admin-dashboard h2 {
            font-size: 1.5rem;
            color: black;
        }

        .admin-dashboard img {
            max-width: 150px;
        }

        .admin-dashboard p {
            color: #444;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /* Latest Items Section */
        .latest-items-section {
            margin-top: 0px;
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

        .item-card a {
            text-decoration: none;
            color: #333;
        }

        .item-card a:hover {
            text-decoration: underline;
        }

        .item-details {
            font-size: 16px;
        }

        .item-card:hover {
        transform: scale(1.05); /* Slightly enlarges the card */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Adds a stronger shadow */
    }

    .dashboard-container {
    margin-left: 180px; /* Matches the width of the sidebar */
    margin-top: 40px; /* Matches the height of the header */
    padding: 20px; /* Adds internal padding for content */
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
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ url('/admin/users') }}"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="{{ url('/admin/listings') }}"><i class="fas fa-list"></i> Listings</a></li>
                <li><a href="{{ url('/admin/reports') }}"><i class="fas fa-exclamation-circle"></i> Reports</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1>IIUM WeRent</h1>
            </div>

            <!-- Admin Dashboard Content -->
            <div class="admin-dashboard">
                <h2>Welcome to Admin Dashboard!</h2>
                <img src="{{ asset('images/logo.png') }}" alt="IIUM WeRent Logo">
                <p>Fostering Community Sharing and Promoting Sustainability at IIUM</p>
            </div>

<!-- Latest Items Section -->
<div class="latest-items-section">
    <h2>Latest Upload</h2>
    @if($latestItems->isEmpty())
        <p>No items found.</p>
    @else
        @foreach($latestItems as $item)
            <a href="{{ url('/admin/admin-item-details/' . $item->id) }}" style="text-decoration: none; color: inherit;">
                <div class="item-card" 
                     style="display: flex; align-items: center; background-color: #fff; border-radius: 8px; padding: 15px; margin-bottom: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <img src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->name }}" style="width: 80px; height: 80px; margin-right: 20px; border-radius: 4px;">
                    <div class="item-details" style="font-size: 16px;">
                        <h3 style="color: blue;">{{ $item->item_name }}</h3>
                        <p>Price: RM{{ $item->price }}</p>
                        <p>Uploaded on: {{ $item->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    @endif
</div>


        </div>
    </div>
</body>
</html>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renter Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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

        .sidebar h1 {
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
            margin-left: 260px;
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

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-right: 40px;
        }

        /* Owner Info Section */
        .user-info {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            margin-top: 60px;
        }

        .user-info table {
            width: auto;
            border-collapse: collapse;
            margin-left: 20px;
        }

        .user-info table th, .user-info table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .user-info table th {
            background-color: #007bff;
            color: white;
            text-align: left;
        }

        .user-info table td {
            background-color: white;
        }

        /* Profile Section */
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0px;
        }

        .profile-image {
        width: 350px;
        height: 350px;
        border-radius: 0; /* Square shape */
        margin-right: 40px;
        object-fit: cover;
        }

        .user-info table {
            width: 100%;
            max-width: 400px;
            border-collapse: collapse;
        }

        /* Items Section */
        .user-items-section {
            margin-top: 40px;
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

        .item-details h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        .item-details p {
            margin: 5px 0;
        }

        /* Remove underline from item links */
        .user-items-section a {
            text-decoration: none;
        }

        .user-items-section a:hover {
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar"><br><br>
            <ul>
                <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ url('/categories') }}"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="{{ url('/wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li><a href="#" id="history-link"><i class="fas fa-history"></i> History</a>
                <ul class="nav" id="history-sections" style="display: none;">
                        <!-- Rent History Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rent.history') }}">My Rental </a>
                        </li>
                        <!-- Rent Out Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rentout.history') }}"> My Rent Out </a>
                        </li>
                    </ul>
                </li>
                <li><a href="#" id="notification-link"><i class="fas fa-bell"></i> Notifications</a>
                <ul class="nav" id="notification-sections" style="display: none;">
                        <!-- Rent Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent') }}">My Rental Status</a>
                        </li>
                        <!-- Rent Out Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent_out') }}">My Rent Request</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('/chat') }}"><i class="fas fa-message"></i> Chat</a></li>
                <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/terms') }}"><i class="fas fa-file-contract"></i> T&Cs</a></li> <!-- T&Cs Link -->
                <li><a href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1>IIUM WeRent</h1>
                <button class="add-post-btn">
                    <a href="{{ route('posts.add') }}">Add A Post</a>
                </button>
            </div>

            <!-- Page Title Section -->
            <div class="page-title">
            <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                Owner Profile / {{ $owner->name }}
            </h2>
            </div>

            <!-- Owner Information -->
            <div class="profile-container">
            <img src="{{ asset($owner->user_image ?? 'images/default-profile.png') }}" alt="User Image" class="profile-image">
                <div class="user-info">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>{{ $owner->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $owner->email }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $owner->status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $owner->location ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $owner->phone_number ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $owner->gender ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h2>Renter Reviews</h2>
            @if($reviews->isEmpty())
                <p>No reviews for this renter yet.</p>
            @else
                <ul>
                    @foreach($reviews as $review)
                        <li>
                            <strong>Item:</strong> {{ $review->item->item_name }} <br>
                            <strong>Review:</strong> {{ $review->item_review }} <br>
                            <strong>Submitted on:</strong> {{ $review->updated_at->format('d M Y') }}
                        </li>
                    @endforeach
                </ul>
            @endif

            </div>
        </div>
    </div>

    <script>
    // JavaScript to toggle the visibility of rent and rent out sections
    document.getElementById('notification-link').addEventListener('click', function() {
        var sections = document.getElementById('notification-sections');
        if (sections.style.display === "none" || sections.style.display === "") {
            sections.style.display = "block"; // Show the sections
        } else {
            sections.style.display = "none"; // Hide the sections
        }
    });

     // JavaScript to toggle the visibility of rent and rent out sections
     document.getElementById('history-link').addEventListener('click', function() {
        var sections = document.getElementById('history-sections');
        if (sections.style.display === "none" || sections.style.display === "") {
            sections.style.display = "block"; // Show the sections
        } else {
            sections.style.display = "none"; // Hide the sections
        }
    });

    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Search Users</title>
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

        /* Search Box Styling */
        .search-box {
            margin-top: 20px;
            background: #f1f1f1;
            padding: 15px;
            border-radius: 10px;
        }

        .search-box input[type="text"], .search-box select {
            padding: 8px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
        }

        .search-box button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-box button:hover {
            background-color: #45a049;
        }

        /* User Card Styling */
        .user-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .user-card img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            border-radius: 4px;
        }

        .user-card .user-info {
            font-size: 16px;
        }

        .user-card .user-info a {
            text-decoration: none;
            color: #007bff;
        }

        .user-card .user-info a:hover {
            text-decoration: underline;
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

            <!-- Page Title Section -->
            <div class="page-title">
                <h2 style="margin-top: 70px; font-size:30px; text-align: left; color: black;">
                    Search Users
                </h2>
            </div>

            <!-- Search Box -->
            <div class="search-box">
                <form action="{{ route('admin.search-users') }}" method="GET">
                    <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}">
                    <select name="status">
                        <option value="">Select Status</option>
                        <option value="student" {{ request('status') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="staff" {{ request('status') == 'staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                    <select name="location">
                        <option value="">Select Location</option>
                        <option value="Mahallah Zubair" {{ request('location') == 'Mahallah Zubair' ? 'selected' : '' }}>Mahallah Zubair</option>
                        <option value="Mahallah Uthman" {{ request('location') == 'Mahallah Uthman' ? 'selected' : '' }}>Mahallah Uthman</option>
                        <option value="Mahallah Faruq" {{ request('location') == 'Mahallah Faruq' ? 'selected' : '' }}>Mahallah Faruq</option>
                        <option value="Mahallah Bilal" {{ request('location') == 'Mahallah Bilal' ? 'selected' : '' }}>Mahallah Bilal</option>
                        <option value="Mahallah Aminah" {{ request('location') == 'Mahallah Aminah' ? 'selected' : '' }}>Mahallah Aminah</option>
                    </select>
                    <button type="submit">Search</button>
                </form>
            </div>

            <!-- Display Search Results -->
            <br><br>
            <h2>Search Results</h2>
            @if($users->isEmpty())
                <p>No users found.</p>
            @else
                @foreach($users as $user)
                    <div class="user-card">
                        <img src="{{ asset($user->user_image ? 'storage/' . $user->user_image : 'images/profiles/profile.png') }}" alt="User Photo">
                        <div class="user-info">
                            <!-- Link user name to admin/user-details.blade.php -->
                            <h3><a href="{{ route('admin.user.details', $user->id) }}">{{ $user->name }}</a></h3>
                            <p>{{ ucfirst($user->status) }}</p>
                            <p>{{ $user->location }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>

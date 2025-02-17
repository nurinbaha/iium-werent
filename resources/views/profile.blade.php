<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            margin-left: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }


.page-title {
    margin-top: 20px; /* Keeps spacing consistent from the main-content padding */
    margin-bottom: 20px; /* Adds spacing below the title */
    font-size: 30px;
    text-align: left;
    color: black;
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

        .profile-image {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            margin-right: 40px;
            object-fit: cover;
        }

        .container {
    margin-top: 20px; /* Adds spacing from the previous section */
    padding: 20px; /* Adds internal spacing */
}


        /* User Info Section */
        .user-info {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    margin-top: 20px; /* Adds spacing between sections */
    padding: 10px; /* Internal spacing for better readability */
}


        .user-info table {
            width: auto;
            border-collapse: collapse;
            margin-left: 0px;
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

        /* Logout Button */
        .logout-btn {
            padding: 10px 20px;
            background-color: #f1c40f;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background-color: #d4ac0d;
        }

        /* Profile Section */
        .profile-container {
    display: flex;
    align-items: center;
    justify-content: center;
}


        .profile-image {
        width: 500px;
        height: 500px;
        border-radius: 0; /* Square shape */
        margin-right: 40px;
        object-fit: cover;
        }.user-info table {
            width: 200%;
            max-width: 60000px;
            border-collapse: collapse;
        }

        /* Items Section */
        .user-items-section {
    margin-top: 0px; /* Reduced margin to maintain consistency */
    padding: 20px; /* Adds internal spacing for items */
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
            width: 200px;
            height: 200px;
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
        .user-items-section a {
            text-decoration: none;
        }

        .user-items-section a:hover {
            text-decoration: none;
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

        $deletedCount = \App\Models\AdminNotification::where('user_id', auth()->id())
                ->whereNull('read_at')
                ->count();
    @endphp
@endif
</head>
<body>
<div class="dashboard-container">
        <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar"><br><br>
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
                <h1>IIUM WeRent</h1>
                <button class="add-post-btn">
                    <a href="{{ route('posts.add') }}">Add A Post</a>
                </button>
            </div>

            <!-- Page Title Section -->
            <div class="page-title">
                <h2 style="margin-top: 10px; font-size:30px; text-align: left; color: black;">
                Profile Page 
                </h2>
            </div>

            <!-- User Information -->
            <div class="profile-container">
            <!-- User Image with Edit Icon -->
            <div style="position: relative; display: inline-block;">
                <img src="{{ asset($user->user_image ? 'storage/' . $user->user_image : 'images/profiles/profile.png') }}" 
                    alt="User Image" 
                    class="profile-image" 
                    style="width:400px; height:400px; object-fit:cover; border: 2px solid #ddd; border-radius: 10px;">
    
                <!-- Icon to Trigger File Input -->
                <label for="user_image" style="
                    position: absolute; 
                    bottom: 10px; 
                    right: 10px; 
                    background-color: #007bff; 
                    color: white; 
                    border-radius: 50%; 
                    padding: 10px; 
                    cursor: pointer;">
                    <i class="fas fa-camera"></i>
                </label>

                <!-- Hidden File Input -->
                <form action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="file" name="user_image" id="user_image" style="display: none;" onchange="document.getElementById('upload-form').submit();">
                </form>
            </div>    

                <div class="container">
                    <h2>User Informations</h2>

                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: 'Success!',
                                text: "{{ session('success') }}",
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif

                    <!-- Conditionally Show Edit Form or Profile Details -->
                    @if ($isEditMode)
                        <!-- Edit Form -->
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ $user->location }}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>
                            <a href="{{ route('profile') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    @else
                       
                    
                    <!-- Profile Information -->
            <div class="user-info">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $user->location ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $user->gender ?? 'N/A' }}</td>
                        </tr>
                        
                    </table>
                </div>

                        <a href="{{ route('profile') }}?edit=true" class="btn btn-warning">Edit Profile</a>
                    @endif
                </div>
            </div>

            <!-- User's Items Section -->
            <div class="user-items-section">
                <h2 style="color:black;">Listings</h2>

                @if($userItems->isEmpty())
                    <p>No items available.</p>
                @else
                    @foreach($userItems as $item)
                        <!-- Wrap the item card in an anchor tag to link to the item details page -->
                        <a href="{{ route('item.show', ['id' => $item->id]) }}" class="item-link">
                            <div class="item-card">
                                @php
                                    $imagePath = $item->images->first() 
                                                ? 'storage/' . $item->images->first()->path 
                                                : 'images/default.jpg';
                                @endphp
                                <img src="{{ asset($imagePath) }}" alt="{{ $item->item_name }}" class="item-image">
                                <div class="item-details">
                                    <h3 style="color:blue;">{{ $item->item_name }}</h3><br>
                                    <p style="color:red;"><strong>RM{{ $item->price }}/day</strong></p>
                                    <p style="color:grey;">{{ $item->created_at->format('d M Y , H:i') }}</p>
                                    <p style="color:grey;">{{ $item->location }}</p>
                                    <p style="color:grey;">Category: {{ ucfirst($item->category) }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
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

<script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'custom-alert-popup'
                    }
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'custom-alert-popup'
                    }
                });
            @endif
        });
    </script>

</body>
</html>
                
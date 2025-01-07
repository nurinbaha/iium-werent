<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Listings</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            font-size: 1.5rem;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 260px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Page Title Styling */
        .page-title {
            margin-top: 70px;
            font-size: 30px;
            color: black;
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
                <h1>IIUM WeRent</h1>
            </div>

            <!-- Page Title Section -->
            <div class="page-title">
            <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                Notifications
            </h2>
            </div>

            <!-- Page Title Section -->
            <div class="page-title">
                <h2>User's Notification</h2>
                <p>This is the landing page for notification.</p>
            </div>

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

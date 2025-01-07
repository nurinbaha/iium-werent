<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
    @endphp
@endif

</head>
<body>
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar"><br><br>
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
        <button class="add-post-btn">
            <a href="{{ route('posts.add') }}">Add A Post</a>
        </button>
    </div>

    <!-- Page Title Section -->
    <div class="page-title">
        <h2 style="margin-top: 30px; font-size:30px; text-align: left; color: black;">
            Owner Profile / {{ $owner->name }}
        </h2>
    </div>

        <!-- Owner Information -->
        <div class="profile-container" style="display: flex; gap: 40px; align-items: flex-start; margin-bottom: 40px;">
            <!-- User Image -->
            <img src="{{ asset($owner && $owner->user_image ? 'storage/' . $owner->user_image : 'images/profiles/profile.png') }}" 
                alt="Owner Image" 
                class="profile-image" 
                style="width: 400px; height: 400px; object-fit: cover; border: 2px solid #ddd; border-radius: 10px;">

            <!-- User Info -->
            <div class="user-info">
                <table style="border-collapse: collapse; width: 100%; max-width: 400px;">
                    <tr>
                        <th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Name</th>
                        <td style="background-color: white; padding: 10px;">{{ $owner->name }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Email</th>
                        <td style="background-color: white; padding: 10px;">{{ $owner->email }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Location</th>
                        <td style="background-color: white; padding: 10px;">{{ $owner->location ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: #007bff; color: white; padding: 10px; text-align: left;">Gender</th>
                        <td style="background-color: white; padding: 10px;">{{ ucfirst($owner->gender) ?? 'N/A' }}</td>
                    </tr>
                </table>

                <!-- Report User Button -->
                @if(auth()->id() !== $owner->id) <!-- Only show for non-owners -->
                <button class="btn btn-danger" 
                        style="margin-top: 20px; padding: 10px; width: 100%; background-color: red; color: white; border: none; border-radius: 5px;" 
                        onclick="openReportUserModal()">
                    Report User
                </button>
                @endif
            </div>
        </div>


        <!-- Hidden Report User Form -->
        <form id="reportUserForm" action="{{ route('report.user.store') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $owner->id }}">
            <input type="hidden" name="reason" id="reportUserReason">
            <input type="hidden" name="details" id="additionalDetailsInput">
        </form>



    <!-- Owner's Items Section -->
    <div class="user-items-section">
        <h2 style="color:black;">Listings</h2>

        @if($ownerItems->isEmpty())
            <p>No items available.</p>
        @else
            @foreach($ownerItems as $item)
                <!-- Wrap the item card in an anchor tag to link to the item details page -->
                <a href="{{ route('item.show', ['id' => $item->id]) }}" class="item-link">
                    <div class="item-card">
                        @php
                            $imagePath = $item->images->first() 
                                        ? 'storage/' . $item->images->first()->path 
                                        : 'images/default.jpg';
                        @endphp
                        <img src="{{ asset($imagePath) }}" alt="{{ $item->item_name }}" class="item-image" style="width: 200px; height: 200px;">
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

        // SweetAlert Modal for Reporting User
            function openReportUserModal() {
        Swal.fire({
            title: 'Report User',
            html: `
                <p>Please select a reason for reporting this user:</p>
                <select id="reportReasonSelect" class="swal2-input">
                    <option value="">Select a reason</option>
                    <option value="Violation of Terms">Violation of Terms</option>
                    <option value="Inappropriate Behavior">Inappropriate Behavior</option>
                    <option value="Fraudulent Activity">Fraudulent Activity</option>
                    <option value="Other">Other</option>
                </select>
                <textarea id="additionalDetails" class="swal2-textarea" placeholder="Additional details (optional)"></textarea>
            `,
            showCancelButton: true,
            confirmButtonText: 'Submit Report',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const reason = document.getElementById('reportReasonSelect').value;
                const details = document.getElementById('additionalDetails').value;

                if (!reason) {
                    Swal.showValidationMessage('Please select a reason to continue.');
                    return false;
                }

                return { reason, details }; // Pass data back to the submit function
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Fill the hidden form fields with the values
                document.getElementById('reportUserReason').value = result.value.reason;
                document.getElementById('additionalDetailsInput').value = result.value.details;
                // Submit the form
                document.getElementById('reportUserForm').submit();
            }
        });
    }


        // SweetAlert Success Message for Reporting
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif

        // SweetAlert Error Message for Reporting (Optional)
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
        @endif

    </script>
</body>
</html>

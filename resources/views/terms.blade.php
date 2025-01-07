<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Rules & Guidelines</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
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
            margin-top: 1250px;
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
        }

        .header-title h2 {
            color: white;
            margin: 0;
            font-size: 1.4rem;
            font-weight: bold;
            margin-left: 10px;
        }

        /* Content Section */
        .content-section {
            margin-top: 0px; /* Adjust for the header */
        }

        .content-section h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .content-section h3 {
            font-size: 22px;
            color: #555;
            margin-bottom: 10px;
        }

        .content-section p {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
        }

        .content-section ul {
            padding-left: 20px;
        }

        .content-section ul li {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
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

        .content-section {
            margin-top: 70px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .content-section h2 {
            font-size: 28px;
            color: #3c75ba;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

.content-section h3 {
            font-size: 22px;
            color: #555;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .rule-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .rule-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .rule-card i {
            font-size: 24px;
            color: #3c75ba;
            margin-right: 15px;
        }

        .rule-card p {
            font-size: 16px;
            color: #666;
            margin: 0;
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #3c75ba;
            color: white;
            padding: 10px 15px;
            border-radius: 50px;
            font-size: 18px;
            cursor: pointer;
            display: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .back-to-top:hover {
            background-color: #0056b3;
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

        <!-- Sidebar -->
        <div class="sidebar">
            <h2>IIUM WeRent</h2>
            <ul>
            <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ url('/categories') }}"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="{{ url('/wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li><a href="#" id="history-link"><i class="fas fa-history"></i> History <i class="fas fa-chevron-down" id="history-arrow"></i></a>
                <ul class="nav" id="history-sections" style="display: none;">
                    <!-- Rent History Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rent.history') }}">My Rental  
                        @if(isset($rentCount) && $rentCount > 0)
                            <span class="badge badge-grey">{{ $rentCount }}</span>
                        @endif
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
            <li><a href="#" id="notification-link"><i class="fas fa-bell"></i> Notifications <i class="fas fa-chevron-down" id="notification-arrow"></i></a>
                <ul class="nav" id="notification-sections" style="display: none;">
                        <!-- Rent Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent') }}"> My Rental Status
                                <span class="badge badge-grey">{{ $unreadCount }}</span>
                            </a>
                        </li>
                        <!-- Rent Out Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent_out') }}">My Rent Request
                            <span class="badge badge-grey">{{ $pendingRequestsCount }}</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('/chat') }}"><i class="fas fa-comments"></i> Chat</a></li>
                <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/terms') }}"><i class="fas fa-file-contract"></i> T&Cs</a></li> <!-- T&Cs Link -->
                <li><a href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

    <div class="main-content

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

<!-- Content Section -->
<div class="content-section">
    <h2>Terms & Conditions</h2>

    <!-- General Rules -->
    <h3>General Rules</h3>
    <div class="rule-card">
        <i class="fas fa-info-circle"></i>
        <p>All users must provide accurate and up-to-date information during registration.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-ban"></i>
        <p>Fraudulent activity, including the posting of fake items, is strictly prohibited.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-comments"></i>
        <p>Users must communicate respectfully and professionally at all times.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-shield-alt"></i>
        <p>Misuse of the platform, such as attempting to manipulate policies or circumvent systems, is strictly forbidden.</p>
    </div>

    <!-- Privacy Policy -->
    <h3>Privacy Policy</h3>
    <div class="rule-card">
        <i class="fas fa-lock"></i>
        <p>User data is collected to improve the platform's functionality and services. Sensitive information will not be shared without explicit consent.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-shield-alt"></i>
        <p>Your data is encrypted and stored securely in compliance with applicable data protection regulations.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-user-shield"></i>
        <p>Users may request access to their data, request deletion, or inquire about how their data is used by contacting support.</p>
    </div>

    <!-- For Renters (Offering Items) -->
    <h3>For Renters (Those Offering Items for Rent)</h3>
    <div class="rule-card">
        <i class="fas fa-box-open"></i>
        <p>Ensure that item details, including pictures, descriptions, and prices, are accurate and updated.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-tools"></i>
        <p>Items must be in good, functional condition and clean before renting out.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-clock"></i>
        <p>Respond promptly to inquiries and booking requests.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-exclamation-triangle"></i>
        <p>Clearly outline any terms regarding liability in case of damage to the item.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-gavel"></i>
        <p>You must legally own or have the right to rent out the item.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-undo-alt"></i>
        <p>Arrange for the item to be returned promptly at the end of the rental period.</p>
    </div>

    <!-- For Renters (Renting Items) -->
    <h3>For Renters (Those Renting Items)</h3>
    <div class="rule-card">
        <i class="fas fa-search"></i>
        <p>Inspect the item upon receiving it to ensure it matches the listing.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-user-check"></i>
        <p>Use rented items responsibly and avoid causing any damage.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-undo-alt"></i>
        <p>Return the item on time and in the same condition as received.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-ban"></i>
        <p>Subletting rented items to other users is strictly prohibited.</p>
    </div>

    <!-- Prohibited Activities -->
    <h3>Prohibited Activities</h3>
    <div class="rule-card">
        <i class="fas fa-ban"></i>
        <p>Listing illegal items or substances is prohibited.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-exclamation-circle"></i>
        <p>Items that pose safety risks, such as weapons or toxic chemicals, are not allowed.</p>
    </div>
    <div class="rule-card">
        <i class="fas fa-certificate"></i>
        <p>Items with expired or fraudulent warranties must not be listed.</p>
    </div>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script>
        // Back-to-top button functionality
        const backToTopButton = document.getElementById("back-to-top");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        });

        backToTopButton.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

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
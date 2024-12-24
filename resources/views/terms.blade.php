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
                <li><a href="{{ url('/rent-history') }}"><i class="fas fa-history"></i> Rent History</a></li>
                <li><a href="{{ url('/notifications') }}"><i class="fas fa-bell"></i> Notifications</a></li>
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
                <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                    Rules & Guidelines
                </h2>
            </div>

            <!-- Rules & Guidelines Content -->
            <div class="content-section">
                <h2>General Rules</h2>
                <p>
                    - All users must provide accurate and up-to-date information during registration.<br>
                    - Any fraudulent activity, including the posting of fake items or false information, is strictly prohibited.<br>
                    - Users should communicate respectfully and professionally at all times.
                </p>

                <h3>For Renters (Those Offering Items for Rent)</h3>
                <ul>
                    <li><strong>Listing Accuracy:</strong> Ensure that the item details, including pictures, descriptions, and prices, are accurate and updated.</li>
                    <li><strong>Condition of Items:</strong> Items listed for rent should be in good, functional condition. It is the renter's responsibility to ensure the item is clean and ready for use.</li>
                    <li><strong>Timely Communication:</strong> Respond to inquiries and booking requests promptly.</li>
                    <li><strong>Damage & Liability:</strong> Clearly state any terms regarding liability in case of damage to the item.</li>
                    <li><strong>Legal Ownership:</strong> You must legally own or have the right to rent out the item.</li>
                    <li><strong>Return Process:</strong> Arrange the return of the item at the end of the rental period in a timely manner.</li>
                </ul>

                <h3>For Renters (Those Renting the Items)</h3>
                <ul>
                    <li><strong>Inspection of Items:</strong> Inspect the item upon receiving it to ensure it matches the listing.</li>
                    <li><strong>Use of Items:</strong> Use rented items responsibly and avoid actions that could lead to damage or loss.</li>
                    <li><strong>Return of Items:</strong> Return the rented item on time, in the same condition you received it.</li>
                    <li><strong>Damage & Responsibility:</strong> If the item is damaged, lost, or stolen, you may be held liable for repairs or replacement costs.</li>
                    <li><strong>No Subletting:</strong> You are not allowed to rent out or sublet an item you have rented to others.</li>
                </ul>

                <h3>Prohibited Items</h3>
                <ul>
                    <li>Illegal items or substances.</li>
                    <li>Weapons, hazardous materials, or any items that pose a safety risk.</li>
                    <li>Items with expired or fraudulent warranties.</li>
                </ul>

            </div>
        </div> <!-- End of main content -->
    </div> <!-- End of dashboard container -->
</body>
</html>

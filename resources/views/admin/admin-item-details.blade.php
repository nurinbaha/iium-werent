<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->name }} - Admin - IIUM WeRent</title>
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

        /* Breadcrumb */
        .breadcrumb {
            margin-top: 0px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            margin-right: 5px;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .item-container {
    display: flex;
    justify-content: flex-start; /* Pastikan kandungan selari ke kiri */
    align-items: flex-start; /* Kandungan sejajar di atas */
    gap: 30px; /* Jarak antara imej dan maklumat */
    padding: 30px;
    margin-left: 20px; /* Pastikan jauh dari sidebar */
    margin-bottom: 0px;
}

.item-image {
    width: 600px;
    height: 600px;
}

.item-image img {
    width: 100%;
    height: auto; /* Kekalkan nisbah imej */
    border-radius: 10px;
}



        .item-info {
            width: 55%;
            padding-left: 20px;
        }

        .item-info h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .item-info p {
            font-size: 14px;
            color: #777;
        }

        .item-info table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .item-info th, .item-info td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* DELETE Button */
        .delete-button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
            width: 100%;
            max-width: 150px;
            text-align: center;
            transition: background-color 0.2s ease;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        /* Popup Styling */
        .delete-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .delete-popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        select:focus {
            outline: none;
            border-color: #007bff;
        }

        .confirm-button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .confirm-button:hover {
            background-color: #c82333;
        }

        .cancel-button {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-button:hover {
            background-color: #5a6268;
        }

        .item-description h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .item-description p {
            font-size: 14px;
            line-height: 1.6;
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

.main-content {
            margin-left: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
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
                <li>
                    <a href="#" id="reports-link">
                        <i class="fas fa-exclamation-circle"></i> Reports 
                        <i class="fas fa-chevron-down" id="reports-arrow" style="margin-left: 8px;"></i>
                    </a>
                    <ul class="nav" id="reports-sections" style="display: none;">
                        <!-- Item Reports Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/reports') }}">Item Reports</a>
                        </li>
                        <!-- User Reports Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/user-reports') }}">User Reports</a>
                        </li>
                    </ul>
                </li>
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
                <h2 style="margin-top: 40px; font-size: 30px; text-align: left; color: black;">
                    Item Details
                </h2>
            </div>

            <!-- Breadcrumb -->
            

            <!-- Item Container -->
            <div class="item-container">
                <!-- Item Image -->
                <div class="item-image">
                @php
                        // Check if the item has an image; use a default if not
                        $imagePath = $item->images->first() ? 'storage/' . $item->images->first()->path : 'images/default.jpg';
                    @endphp
                <img src="{{ asset($imagePath) }}" alt="{{ $item->item_name }}" class="item-image">
                </div>

                <!-- Item Information -->
                <div class="item-info">
                    <h1>{{ $item->item_name }}</h1>
                    <div class="breadcrumb">
                        <a href="{{ route('admin.view-listings') }}">Listings</a> / {{ $item->item_name }}
                    </div>
                    <p>Listed on {{ $item->created_at->format('d M Y, H:i') }} / {{ $item->location }}</p>

                    <table>
                        <tr>
                            <th>Price</th>
                            <td>RM{{ $item->price }} / Day</td>
                        </tr>
                        <tr>
                            <th>Owner</th>
                            <td>
                                <a href="{{ route('admin.user.details', ['id' => $item->user->id]) }}">
                                    {{ $item->user->name }}
                                </a>
                                <br>
                                <span>{{ $item->user->email }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ ucfirst($item->category) }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $item->location }}</td>
                        </tr>
                        <tr>
                            <th>Pickup Method</th>
                            <td>{{ $item->pickup_method }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $item->item_description }}</td>
                        </tr>
                    </table>

                    <!-- DELETE Button -->
                    <button type="button" class="delete-button" onclick="openDeletePopup()">Delete Post</button>
                </div>
            </div>

            <!-- Delete Confirmation Popup -->
            <div id="deletePopup" class="delete-popup">
                <div class="delete-popup-content">
                    <h3>Are you sure you want to delete this post?</h3>
                    <form action="{{ route('admin.delete-item', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <label for="delete_reason">Reason for Deletion:</label>
                        <select name="delete_reason" required>
                            <option value="" disabled selected>Select a reason</option>
                            <option value="Inappropriate Content">Inappropriate Content</option>
                            <option value="Spam">Spam</option>
                            <option value="Fraudulent Listing">Fraudulent Listing</option>
                            <option value="Violation of Terms">Violation of Terms</option>
                            <option value="Other">Other</option>
                        </select>
                        <button type="submit" class="confirm-button">Confirm</button>
                        <button type="button" class="cancel-button" onclick="closeDeletePopup()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeletePopup() {
            document.getElementById('deletePopup').style.display = 'flex';
        }

        function closeDeletePopup() {
            document.getElementById('deletePopup').style.display = 'none';
        }

        // Toggle Reports Section
        document.getElementById('reports-link').addEventListener('click', function () {
            toggleSection('reports-sections', 'reports-arrow');
        });

        // Generic Function to Toggle Sections
        function toggleSection(sectionId, arrowId) {
            var section = document.getElementById(sectionId);
            var arrow = document.getElementById(arrowId);

            if (section.style.display === "none" || section.style.display === "") {
                section.style.display = "block";
                arrow.classList.add('rotate-down'); // Add a CSS class for the down arrow
            } else {
                section.style.display = "none";
                arrow.classList.remove('rotate-down'); // Remove the class for the default arrow
            }
        }
    </script>

</body>
</html>

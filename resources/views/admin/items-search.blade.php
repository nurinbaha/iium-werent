<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Search Items</title>
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

        /* Item Card Styling */
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
            width: 180px;
            height: 180px;
            margin-right: 20px;
            border-radius: 4px;
        }

        .item-card .item-info {
            font-size: 16px;
        }

        .item-link {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit color from parent */
}

.item-link:hover {
    color: inherit; /* Keep the color unchanged on hover */
    text-decoration: none; /* Ensure no underline appears */
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
                <h2 style="margin-top: 30px; font-size:30px; text-align: left; color: black;">
                    Search Items
                </h2>
            </div>

            <!-- Search Box -->
<!-- Search Box -->
<div class="search-box">
    <form action="{{ route('admin.search-items') }}" method="GET"> <!-- Updated action -->
        <input type="text" name="item_name" placeholder="Item Name" value="{{ request('item_name') }}" style="width: 400px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
        <select name="category">
            <option value="">Select Category</option>
            <option value="fashion" {{ request('category') == 'fashion' ? 'selected' : '' }}>Fashion</option>
            <option value="home-living" {{ request('category') == 'home-living' ? 'selected' : '' }}>Home & Living</option>
            <option value="books-stationaries" {{ request('category') == 'books-stationaries' ? 'selected' : '' }}>Books & Stationaries</option>
            <option value="sports-equipment" {{ request('category') == 'sports-equipment' ? 'selected' : '' }}>Sports Equipment</option>
            <option value="mobile-electronics" {{ request('category') == 'mobile-electronics' ? 'selected' : '' }}>Mobile & Electronics</option>
            <option value="free-items" {{ request('category') == 'free-items' ? 'selected' : '' }}>Free Items</option>
            <option value="others" {{ request('category') == 'others' ? 'selected' : '' }}>Others</option>
        </select>
        <select name="location"> <!-- Changed "area" to "location" for consistency -->
        <option value="">Select Location</option>
                    <option value="Mahallah Ali" {{ request('location') == 'Mahallah Ali' ? 'selected' : '' }}>Mahallah Ali</option>
                    <option value="Mahallah Zubair" {{ request('location') == 'Mahallah Zubair' ? 'selected' : '' }}>Mahallah Zubair</option>
                    <option value="Mahallah Uthman" {{ request('location') == 'Mahallah Uthman' ? 'selected' : '' }}>Mahallah Uthman</option>
                    <option value="Mahallah Uthman" {{ request('location') == 'Mahallah Uthman' ? 'selected' : '' }}>Mahallah Uthman</option>
                    <option value="Mahallah Faruq" {{ request('location') == 'Mahallah Faruq' ? 'selected' : '' }}>Mahallah Faruq</option>
                    <option value="Mahallah Bilal" {{ request('location') == 'Mahallah Bilal' ? 'selected' : '' }}>Mahallah Bilal</option>
                    <option value="Mahallah Siddiq" {{ request('location') == 'Mahallah Siddiq' ? 'selected' : '' }}>Mahallah Siddiq</option>
                    <option value="Mahallah Salahuddin" {{ request('location') == 'Mahallah Salahuddin' ? 'selected' : '' }}>Mahallah Salahuddin</option>
                    <option value="Mahallah Aminah" {{ request('location') == 'Mahallah Aminah' ? 'selected' : '' }}>Mahallah Aminah</option>
                    <option value="Mahallah Asiah" {{ request('location') == 'Mahallah Asiah' ? 'selected' : '' }}>Mahallah Asiah</option>
                    <option value="Mahallah Hafsa" {{ request('location') == 'Mahallah Hafsa' ? 'selected' : '' }}>Mahallah Hafsa</option>
                    <option value="Mahallah Asma" {{ request('location') == 'Mahallah Asma' ? 'selected' : '' }}>Mahallah Asma</option>
                    <option value="Mahallah Ruqayyah" {{ request('location') == 'Mahallah Ruqayyah' ? 'selected' : '' }}>Mahallah Ruqayyah</option>
                    <option value="Mahallah Halimah" {{ request('location') == 'Mahallah Halimah' ? 'selected' : '' }}>Mahallah Halimah</option>
                    <option value="Mahallah Maryam" {{ request('location') == 'Mahallah Maryam' ? 'selected' : '' }}>Mahallah Maryam</option>
                    <option value="Mahallah Nusaibah" {{ request('location') == 'Mahallah Nusaibah' ? 'selected' : '' }}>Mahallah Nusaibah</option>
                    <option value="Mahallah Sumayyah" {{ request('location') == 'Mahallah Sumayyah' ? 'selected' : '' }}>Mahallah Sumayyah</option>
                    <option value="Mahallah Safiyyah" {{ request('location') == 'Mahallah Safiyyah' ? 'selected' : '' }}>Mahallah Safiyyah</option>
                    <option value="Off Campus" {{ request('category') == 'Off Campus' ? 'selected' : '' }}>Off Campus</option>
                </select>
        <button type="submit">Search</button>
    </form>
</div>

            <!-- Display Search Results -->
            <br><br>
            <h2>Results Found</h2>
            @if($items->isEmpty())
                <p>No items found.</p>
            @else
                @foreach($items as $item)
                    <div class="item-card">
                    @php
                        // Check if the item has an image; use a default if not
                        $imagePath = $item->images->first() ? 'storage/' . $item->images->first()->path : 'images/default.jpg';
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="{{ $item->item_name }}" style="width: 180px; height: 180px; margin-right: 20px; border-radius: 4px;" class="item-image">
                        <div class="item-info">
                            <h3><a href="{{ route('admin.item.details', $item->id) }}">{{ $item->item_name }}</a></h3>
                            <p>Category: {{ $item->category }}</p>
                            <p>Location: {{ $item->location }}</p>
                            <p>Price: RM{{ $item->price }}/day</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
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

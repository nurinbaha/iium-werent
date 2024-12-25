<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - IIUM WeRent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
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
    padding: 5px 20px; /* Reduced padding */
    margin-bottom: 5px; /* Adjust the margin to reduce space between items */
}

.sidebar ul li a {
    font-size: 16px; /* You can also adjust the font size if needed */
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
            color: #0dcaf0; /* Icon color on hover */
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 260px; /* To align with the sidebar */
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 180px; /* Adjust the sidebar width */
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #222;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); 3c75ba
        }

        /* Header Styling */
        .header {
    background-color: #3c75ba;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between; /* Adjust the elements to be spread apart */
    align-items: center;
    width: 100%;
    height: 40px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
    border-bottom: none;
}

.header-title h2 {
    color: white; /* Set the text color */
    margin: 0;
    font-size: 1.4rem; /* Adjust the size as needed */
    font-weight: bold;
    margin-left: 10px; /* Adjust this margin to control the left spacing */
}


        /* Adjust the Add Post Button */
        .header .add-post-btn a {
            color: #ffffff;
            background-color: #f1c40f;
            font-size: 1rem
            padding: 8px 15px;
            border-radius: 10px;
            text-decoration: none;
        }

        .header .add-post-btn a:hover {
            background-color: #0a73a6;
        }

        /* Search Box Styling */

        .search-section {
    background-color: transparent; /* Change to transparent to remove the grey background */
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    margin-top: 0px; /* Adjust this value to create space between the header and the search section */
    display: flex;
    align-items: center;
    justify-content: space-between;
}

        
.search-box {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.search-box input {
    width: 100%;
    max-width: 400px; /* Set a consistent width */
    padding: 10px;
    margin-bottom: 10px; /* Space below the input field */
    border-radius: 5px;
    border: 1px solid #ccc;
}

.category-filters {
    display: flex;
    justify-content: space-between;
    gap: 10px; /* Space between dropdowns */
}

.category-dropdown, .area-dropdown {
    width: 100%;
    max-width: 200px; /* Set a consistent width for the dropdowns */
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.search-btn {
    padding: 10px 20px;
    background-color: #007bff;
    border: none;
    color: white;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 10px;
}

.search-btn:hover {
    background-color: #0056b3;
}


        .categories-section {
            margin-bottom: 20px;
            margin-top: 0px;
        }

        .category-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            margin-right: 0px;
            border-radius: 10px;
            text-decoration: none;
        }

        .category-btn:hover {
            background-color: #0056b3;
        }

        /* Latest Items Section */
        .latest-items-section-dashboard {
            margin-bottom: 30px;
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

        /* Remove underline from item links */
        .latest-items-section-dashboard a {
            text-decoration: none;
        }

        .latest-items-section-dashboard a:hover {
            text-decoration: underline;
        }

        /* Flash Message Styling */
        .post-alert {
            padding: 10px;
            border-radius: 5px;
        }

        .post-alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .post-alert-danger {
            background-color: #f8d7da;
            color: #721c24;
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
        .latest-items-section-dashboard a {
            text-decoration: none;
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
    <div class="header-title">
        <h2>IIUM WeRent</h2>
    </div>
    <button class="add-post-btn">
        <a href="{{ route('posts.add') }}">Add A Post</a>
    </button>
</div>
<br><br>

            <!-- Page Title Section -->
            <div class="page-title">
            <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                Search Result
            </h2>
            </div>

<div class="search-section">
    <!-- Logo Container -->
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="IIUM WeRent Logo">
        <p>Fostering Community Sharing and Promoting Sustainability at IIUM</p>
    </div>

    <!-- Search Box -->
    <div class="search-box">
        <h2>Search for your desired items!</h2>
        <!-- Begin Search Form -->
        <form action="{{ route('search') }}" method="GET">
            @csrf
            <input 
                type="text" 
                name="item_name" 
                placeholder="What are you looking for?" 
                class="search-input" 
                value="{{ request('item_name') }}">
            <div class="category-filters">
                <select name="category" class="category-dropdown">
                    <option value="">Categories</option>
                    <option value="fashion" {{ request('category') == 'fashion' ? 'selected' : '' }}>Fashion</option>
                    <option value="home-living" {{ request('category') == 'home-living' ? 'selected' : '' }}>Home & Living</option>
                    <option value="books-stationaries" {{ request('category') == 'books-stationaries' ? 'selected' : '' }}>Books & Stationaries</option>
                    <option value="sports-equipment" {{ request('category') == 'sports-equipment' ? 'selected' : '' }}>Sports Equipment</option>
                    <option value="mobile-electronics" {{ request('category') == 'mobile-electronics' ? 'selected' : '' }}>Mobile & Electronics</option>
                    <option value="free-items" {{ request('category') == 'free-items' ? 'selected' : '' }}>Free Items</option>
                    <option value="others" {{ request('category') == 'others' ? 'selected' : '' }}>Others</option>
                </select>
                <select name="location" class="area-dropdown">
                    <option value="">Location</option>
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
                </select>
            </div>
            <button type="submit" class="search-btn">Search</button>
        </form>
        <!-- End Search Form -->
    </div>
</div>

<!-- Categories Section -->
<div class="categories-section">
                <h2>Browse Categories</h2><br>
                <div class="categories-buttons">
                    <a href="{{ url('/category/fashion') }}" class="category-btn">Fashion</a>
                    <a href="{{ url('/category/home-living') }}" class="category-btn">Home & Living</a>
                    <a href="{{ url('/category/books-stationaries') }}" class="category-btn">Books & Stationaries</a>
                    <a href="{{ url('/category/sports-equipment') }}" class="category-btn">Sports Equipment</a>
                    <a href="{{ url('/category/mobile-electronics') }}" class="category-btn">Mobile & Electronics</a>
                    <a href="{{ url('/category/free-items') }}" class="category-btn">Free Items</a>
                    <a href="{{ url('/category/others') }}" class="category-btn">Others</a>
                </div>
            </div>

            <!-- Search Results Section -->
            <div class="latest-items-section-dashboard">
                <h2>Results found</h2>
                @if($results->isEmpty())
    <p>No items found.</p>
@else
    @foreach($results as $item)
        <a href="{{ route('item.show', ['id' => $item->id]) }}" class="item-link">
            <div class="item-card">
                <img src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->item_name }}" class="item-image">
                <div class="item-details">
                    <h3>{{ $item->item_name }}</h3><br>
                    <p><strong>RM{{ $item->price }}/day</strong></p>
                    <p>{{ $item->created_at->format('d M Y , H:i') }}</p>
                    <p>{{ $item->location }}</p>
                    <p>Category > {{ $item->category }}</p>
                </div>
            </div>
        </a>
    @endforeach
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

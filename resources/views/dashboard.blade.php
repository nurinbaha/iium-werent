<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Dashboard</title>
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

        .dashboard-container{
            margin-left: 220px;
            width: 100%;
        }

        /* Main Content Styling */
        .main-content {
            padding-inline: 130px;
            background-color: rgb(255, 255, 255);
            margin-top: 20px;
            overflow: auto; /* Allow the content to grow dynamically */
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
    text-align: center;
}

.search-box input {
    width: 100%;
    box-sizing: border-box;
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
            object-fit: cover;
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
            margin-bottom: 0px;
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

        .no-rent-requests-container {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                <li><a href="#" id="history-link"><i class="fas fa-history"></i> History <i class="fas fa-chevron-down" id="history-arrow"></i></a>
                <ul class="nav" id="history-sections" style="display: none;">
                    <!-- Rent History Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rent.history') }}"> My Rental</a>
                    </li>
                    <!-- Rent Out Notifications Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rentout.history') }}">My Rent Out</a>
                    </li>
                </ul>
            </li>
            <li><a href="#" id="notification-link"><i class="fas fa-bell"></i> Notifications <i class="fas fa-chevron-down" id="notification-arrow"></i></a>
                <ul class="nav" id="notification-sections" style="display: none;">
                        <!-- Rent Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.rent') }}">My Rental Status
                            @if($unreadCount > 0)
                                <span class="badge badge-grey">{{ $unreadCount }}</span>
                            @endif
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
            <h2 style="margin-top: 40px; font-size: 30px; text-align: left; color: black;">
                Home
            </h2>
            </div>

            <!-- Search Box -->
<div class="search-section">
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="IIUM WeRent Logo">
        <p>Fostering Community Sharing and Promoting Sustainability at IIUM</p>
    </div>
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
                    <option value="">Select Location</option>
                    <option value="Off Campus" {{ request('location') == 'Off Campus' ? 'selected' : '' }}>Off Campus</option>
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

<!-- Items Near You Section in Dashboard -->
<div class="latest-items-section-dashboard">
    <h2>Recommended Items Near You</h2>
    @if($itemsNearYou->isEmpty())
    <div class="no-rent-requests-container">
                        <h3>No items was found near you</h3>
                        <p>Please come and check again soon !</p>
                        <img src="{{ asset('storage/images/unavailable.png') }}" alt="No items found" 
                            style="width: 300px; height: auto; display: block; margin: 0 auto; border: 0px solid #ddd; border-radius: 10px;">
    </div>
    @else
        @foreach($itemsNearYou as $item)
            <!-- Wrap the item card in an anchor tag to link to the item details page -->
            <a href="{{ route('item.show', ['id' => $item->id]) }}" class="item-link">
                <div class="item-card">
                    @php
                        // Check if the item has an image; use a default if not
                        $imagePath = $item->images->first() ? 'storage/' . $item->images->first()->path : 'images/default.jpg';
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="{{ $item->item_name }}" class="item-image">
                    <div class="item-details">
                        <h3>{{ $item->item_name }}</h3><br>
                        <p><strong>RM{{ number_format($item->price, 2) }}/day</strong></p>
                        <p>{{ $item->created_at->format('d M Y , H:i') }}</p>
                        <p>{{ $item->location }}</p>
                        <p>Category > {{ ucfirst($item->category) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    @endif
</div> <!-- End of items near you section -->


        </div> <!-- End of main content -->
    </div> <!-- End of dashboard container -->

    <!-- JavaScript for auto-hiding alerts after 3 seconds -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Success message logic
            var alertMessage = '{{ session("success") }}'; // Get the success message from the session
            if (alertMessage) {
                Swal.fire({
                    title: 'Success!',
                    text: alertMessage,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 3000, // Optional: Auto-close after 3 seconds
                    timerProgressBar: true,
                    customClass: {
                        popup: 'custom-alert' // Add a custom class to the alert
                    }
                });
            }

            // Deleted items notification logic
            var deletedItemsMessage = "{{ session('deleted_items_message') }}"; // Get the deleted items message
            if (deletedItemsMessage) {
                Swal.fire({
                    title: 'Notice',
                    text: deletedItemsMessage,
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'custom-alert' // Add a custom class to the alert
                    }
                });
            }
        });

    </script>

    <style>
        /* Add this CSS to style the SweetAlert */
        .custom-alert {
            margin-left: 170px !important; /* Adjust the margin-left value as needed */
        }
    </style>

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


        //count pending
        setInterval(function() {
            fetch('{{ route("pending.count") }}')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.badge.bg-danger').textContent = data.count;
                })
                .catch(error => console.error('Error:', error));
        }, 5000); // Check every 5 seconds


    </script>

<style>
    /* Add this CSS to style the SweetAlert */
    .custom-alert {
        margin-left: 150px !important; /* Adjust the margin-left value as needed */
    }
</style>

</body>
</html>

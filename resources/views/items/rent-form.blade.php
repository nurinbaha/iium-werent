 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Rent Form </title>
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
                            <a class="nav-link" href="{{ route('rent.history') }}"> My Rental</a>
                        </li>
                        <!-- Rent Out Notifications Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rentout.history') }}">My Rent Out</a>
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

<br>

            <!-- Page Title Section -->
            <div class="page-title">
            <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                Rent Form
            </h2>
            </div>

@section('content')
<div class="container">
    <h1>Rent Item: {{ $item->item_name }}</h1>
    <p>Price per day: RM {{ number_format($item->price, 2) }}</p>
    <p>Location: {{ $item->location }}</p>

    <form action="{{ route('item.rent.confirm', $item->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Total Days</label>
            <input type="text" id="total_days" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Total Price</label>
            <input type="text" id="total_price" class="form-control" readonly>
        </div>
        <button type="submit" class="btn btn-success">Confirm Rent</button>
    </form>
</div>

<script>
document.getElementById('start_date').addEventListener('change', calculateTotal);
document.getElementById('end_date').addEventListener('change', calculateTotal);

function calculateTotal() {
    const startDate = new Date(document.getElementById('start_date').value);
    const endDate = new Date(document.getElementById('end_date').value);
    if (startDate && endDate && endDate > startDate) {
        const totalDays = (endDate - startDate) / (1000 * 60 * 60 * 24);
        const pricePerDay = {{ $item->price }};
        document.getElementById('total_days').value = totalDays;
        document.getElementById('total_price').value = (totalDays * pricePerDay).toFixed(2);
    } else {
        document.getElementById('total_days').value = '';
        document.getElementById('total_price').value = '';
    }
}
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

@endsection

</body>
</html>

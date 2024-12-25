<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - My Rental</title>
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
            text-align: center;
            margin: 0 0 30px 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin-bottom: 5px;
        }

        .sidebar ul li a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 5px 20px;
            border-radius: 4px;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar ul li a:hover {
            background-color: #1f2529;
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

.header-title h2 {
    color: white;
    margin: 0;
    font-size: 1.4rem;
    font-weight: bold;
    margin-left: 10px;
}

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


        /* Main Content Styling */
        .main-content {
            margin-left: 200px;
            margin-top: 70px; /* Space below the fixed header */
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Wishlist Item Styling */
        .wishlist-section h2 {
            margin-bottom: 20px;
        }

        .item-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .item-card img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            border-radius: 4px;
        }

        .item-details {
            flex: 1;
        }

        .item-details h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        .item-details p {
            margin: 5px 0;
        }

        .item-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-info {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
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
            <div class="add-post-btn">
                <a href="{{ route('posts.add') }}">Add A Post</a>
            </div>
        </div>

           <!-- Page Title Section -->
           <div class="page-title">
            <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                My Rental
            </h2>
            </div>

   

    @if($rentHistory->isEmpty())
        <p>No rent history found.</p>
    @else
        <ul>
            @foreach($rentHistory as $history)
                <li>
                    <strong>Item: {{ $history->item->item_name }}</strong><br>
                    Rent Duration: {{ $history->start_date }} to {{ $history->end_date }} ({{$history->total_days}} days)<br>
                    Status: {{ ucfirst($history->status) }}<br>
                    Total Price: RM {{ number_format($history->total_price, 2) }}<br>
                    Final Price: RM {{ number_format($history->final_price, 2) }}<br>

                    @if($history->status === 'rented')
                        <form action="{{ route('history.markReturned', $history->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Returned</button>
                        </form>
                    @elseif($history->status === 'returned' && is_null($history->item_review))
                        <form action="{{ route('history.submitReview', $history->id) }}" method="POST">
                            @csrf
                            <div>
                                <label for="item_review">Write a Review:</label><br>
                                <textarea id="item_review" name="item_review" rows="3" cols="50" placeholder="Enter your review" required></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-secondary">Submit Review</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

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

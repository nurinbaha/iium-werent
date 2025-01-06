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

        /* Centered Form Styling */
        .rent-container {
            max-width: 600px; /* Increase the maximum width */
            margin: 0 auto; /* Center the container */
            background: #ffffff; /* Background color */
            padding: 30px; /* Increase padding for a larger box */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Add a subtle shadow for better visibility */
            margin-top: 70px; /* Adjust spacing from the top */
            display: flex; 
            flex-direction: column;
            align-items: center;
        }


    .rent-container h1 {
        text-align: center; /* Center the container heading */
        margin-bottom: 20px; /* Add space below the heading */
    }

        .rent-container p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
            text-align: center;
        }

        .rent-container .form-group {
            margin-bottom: 15px;
            
        }

        .rent-container .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .rent-container .form-group input {
    width: 100%; /* Make inputs take full width */
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

        .rent-container .form-group input[readonly] {
            background:rgb(255, 255, 255);
        }

        .rent-container button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            border: none;
        }

        .form-group {
        margin-bottom: 15px;
        text-align: center;
    }

    .form-control {
        width: 300%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .btn-success {
        width: 112%; /* Makes the button take full width */
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #28a745;
        color: white;
        font-size: 16px;
        cursor: pointer;
        align-items: center;
    }

    .btn-success:hover {
        background-color: #218838;

    }

    .dashboard-container {
    margin-left: 180px; /* Matches the width of the sidebar */
    margin-top: 0px; /* Matches the height of the header */ /* Adds internal padding for content */
    background-color: #ffffff; /* Background color for the dashboard */
    min-height: calc(100vh - 40px); /* Adjusts height to fit within the viewport */
    width: calc(100% - 180px); /* Adjusts width to exclude the sidebar */
    box-sizing: border-box; /* Ensures padding is included in width/height calculations */
        }

        .main-content {
                    margin-left: 40px;
                    padding: 20px;
                    background-color: #f8f9fa;
                    overflow: auto;
                }

                #history-arrow, #notification-arrow {
                    transition: transform 0.3s;
                    margin-left: 10px;
                }

         .rotate-down {
                    transform: rotate(180deg);
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

        <div class="rent-container">
        @php
        // Check if the item has an image; use a default if not
        $imagePath = $item->images->first() ? 'storage/' . $item->images->first()->path : 'images/default.jpg';
        @endphp
        <img src="{{ asset($imagePath) }}" alt="{{ $item->item_name }}" style="width: 250px; height: 250px; border-radius: 4px; margin-top: 0px;" class="item-image">
        <h1>{{ $item->item_name }}</h1>
        <p><strong>Price per day:</strong> RM {{ number_format($item->price, 2) }}</p>
        <p><strong>Location:</strong> {{ $item->location }}</p>
        <p><strong>Category:</strong> {{ ucfirst($item->category) }}</p>
        <p><strong>Pickup Method:</strong> {{ $item->pickup_method }}</p>
        <p><strong>Description:</strong> {{ $item->item_description }}</p><br>

        <h2 style="font-size: 20px; color: #0a73a6; text-align: center; margin-top: 10px;">Please fill in your desired date :</h2>

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
        <button type="submit" class="btn-success">Confirm</button>
    </form>
</div>

<script>
    // Get today's date in the correct format (YYYY-MM-DD)
    const today = new Date().toISOString().split('T')[0];

    // Disable past dates in both input fields
    document.getElementById('start_date').setAttribute('min', today);
    document.getElementById('end_date').setAttribute('min', today);

    // Add event listeners to calculate total days and price
    document.getElementById('start_date').addEventListener('change', updateEndDate);
    document.getElementById('end_date').addEventListener('change', calculateTotal);

    function updateEndDate() {
        const startDate = document.getElementById('start_date').value;
        if (startDate) {
            // Set the minimum end date based on selected start date
            document.getElementById('end_date').setAttribute('min', startDate);
        }
        calculateTotal(); // Recalculate in case end date is already selected
    }

    function calculateTotal() {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);
        if (startDate && endDate && endDate >= startDate) {
            const totalDays = (endDate - startDate) / (1000 * 60 * 60 * 24);
            const pricePerDay = {{ $item->price }};
            document.getElementById('total_days').value = totalDays;
            document.getElementById('total_price').value = (totalDays * pricePerDay).toFixed(2);
        } else {
            document.getElementById('total_days').value = '';
            document.getElementById('total_price').value = '';
        }
    }

        </script>  

<script>
    // Unavailable dates passed from backend
    const unavailableDates = @json($unavailableDates);

    // Get input fields
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');

    // Disable unavailable dates on focus
    document.addEventListener('DOMContentLoaded', function () {
        disableUnavailableDates(startDateInput, unavailableDates);
        disableUnavailableDates(endDateInput, unavailableDates);
    });

    // Update end date minimum based on start date selection
    startDateInput.addEventListener('input', function () {
        const selectedStartDate = new Date(startDateInput.value);
        if (startDateInput.value) {
            // Set end date minimum as the selected start date
            endDateInput.setAttribute('min', startDateInput.value);

            // Filter unavailable dates for the end date
            const filteredDates = unavailableDates.filter(date => new Date(date) >= selectedStartDate);
            disableUnavailableDates(endDateInput, filteredDates);
        }
    });

    // Function to disable unavailable dates dynamically
    function disableUnavailableDates(inputElement, dates) {
        const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
        inputElement.setAttribute('min', today);

        // Disable unavailable dates when input is focused
        inputElement.addEventListener('focus', function () {
            const selectedDate = inputElement.value;

            // Use custom validity to block unavailable dates
            inputElement.addEventListener('input', function () {
                const selectedDate = inputElement.value;
                if (dates.includes(selectedDate)) {
                    inputElement.setCustomValidity("This date is unavailable. Please select another date.");
                    inputElement.reportValidity(); // Show validity message
                    inputElement.value = ""; // Clear the invalid input
                } else {
                    inputElement.setCustomValidity(""); // Clear validity message
                }
            });
        });
    }
</script>


        
</body>
</html>

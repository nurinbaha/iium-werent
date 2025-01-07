<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->name }} - IIUM WeRent</title>
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

        .dashboard-container{
            margin-left: 220px;
            width: 100%;
        }

        /* Main Content Styling */
        .main-content {
            padding-inline: 30px;
            background-color: rgb(255, 255, 255);
            overflow: auto; /* Allow the content to grow dynamically */
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

        /* Breadcrumb */
        .breadcrumb {
            margin-top: 10px;
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

        /*carousel*/
        .custom-carousel {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-images img {
            width: 100%;
            flex-shrink: 0;
            border-radius: 10px;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 10px;
            z-index: 1000;
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        .carousel-control:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Item Container */
        .item-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        .item-image {
            width: 40%;
        }

        .item-image img {
            display: flex;
            /* flex-grow: 1; */
            width: 100%;
            height: 500px;
            border-radius: 10px;
            object-fit: contain;
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

        /* Action Buttons */
        .btn-rent, .btn-wishlist {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-wishlist {
            background-color: #ffc107;
        }

        /* Item Description */
        .item-description {
            margin-top: 30px;
        }

        .item-description h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .item-description p {
            font-size: 14px;
            line-height: 1.6;
        }

        .header-title h1 {
            color: white;
            margin: 0;
            font-size: 1.4rem;
            font-weight: bold;
            margin-left: 10px;
        }

        .wishlist-button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 24px;
        margin: 10px 0;
        }

        .wishlist-button i {
            transition: color 0.3s ease;
        }

        .wishlist-button:hover i {
            color: #ff6b6b; /* Light red hover color */
        }

        .review-container {
            margin-top: 20px;
        }

        .review-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .review-box strong {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .review-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .review-box .review-date {
            font-size: 12px;
            color: #888;
            text-align: right;
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
        
            $deletedCount = \App\Models\AdminNotification::where('user_id', auth()->id())
                ->whereNull('read_at')
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
                <li><a class="nav-link" href="{{ route('admin.notifications') }}"><i class="fas fa-bell"></i> Notification
                                <span class="badge badge-grey" style="margin-left: 5px;">{{ $deletedCount }}</span>
                            </a>
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
                        <a class="nav-link" href="{{ route('rent.history') }}">My Rental
                            <span class="badge badge-grey" style="margin-left: 10px;">{{ $rentCount }}</span>
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
            <div class="page-title" style="display: flex; align-items: center; gap: 10px; margin-top: 70px;">
                <h2 style="margin: 0; font-size: 30px; color: black;">
                    {{ $item->item_name }}
                </h2>
                @if($item->user_id !== auth()->id())
                <!-- Wishlist Button (Only visible to non-owners) -->
                <form action="{{ route('wishlist.toggle', $item->id) }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; font-size: 24px; display: flex; align-items: center;">
                        @if ($item->is_in_wishlist)
                            <i class="fas fa-heart" style="color: red;"></i> <!-- Already in Wishlist -->
                        @else
                            <i class="far fa-heart"></i> <!-- Not in Wishlist -->
                        @endif
                    </button>
                </form>
                @endif
            </div>



            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="{{ url('/categories') }}">Home</a> / 
                <a href="{{ url('/category/' . $item->category) }}">{{ ucfirst($item->category) }}</a> / 
                {{ $item->item_name }}
            </div>

            <!-- Item Container -->
            <div class="item-container">
                <!-- Item Image -->
                <div class="item-image">
                    <div class="custom-carousel">
                        <div class="carousel-images">
                            @foreach ($item->images as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Item Image" />
                            @endforeach
                        </div>
                        <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
                        <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
                    </div>
                </div>

                <!-- Item Information -->
                <div class="item-info">
                    <h1>{{ $item->name }}</h1>
                    
                    <p>Listed on {{ $item->created_at->format('d M Y, H:i') }} / {{ $item->location }}</p>

                    <!-- Item Info Table -->
                    <table>
                        <tr>
                            <th>Price</th>
                            <td>RM{{ $item->price }} / Day</td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td>
                            <a href="{{ route('owner.profile', ['user_id' => $item->user_id]) }}">
                                {{ $item->user->name }}
                            </a><br>
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

<!-- Action Buttons -->
<div class="item-actions" style="display: flex; gap: 10px; align-items: center;">

    <!-- Rent Button -->
    @if($item->user_id !== auth()->id())
        <a href="{{ route('item.rent.form', $item->id) }}" class="btn btn-success" style="padding: 8px 15px;">
            <i class="fas fa-calendar-alt"></i> Rent
        </a>
    @endif

    <!-- Report Button -->
    @if($item->user_id !== auth()->id())
    <button class="btn btn-danger" style="padding: 8px 15px; background-color: green; color: white; border: none; border-radius: 5px;" onclick="openReportModal()">Report Item</button>

    @endif

    <!-- Hidden Report -->
    <form id="reportForm" action="{{ route('report.store') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <input type="hidden" name="reason" id="reportReason">
</form>

    <!-- Edit Button (Only visible to the owner of the item) -->
    @if($item->user_id === auth()->id())
        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning" style="padding: 8px 15px;">
            Edit
        </a>
    @endif
</div>


<h2>Item Reviews</h2>
<div class="review-container">
    @if($item->reviews->isEmpty())
        <p>No reviews for this item yet.</p>
    @else
        @foreach($item->reviews as $review)
            <div class="review-box">
                <strong>Reviewed by :  {{ $review->renter->name }}</strong>
                <p>{{ $review->item_review }}</p>
                <div class="review-date">
                    <em>Submitted on : {{ $review->updated_at->format('d M Y') }}</em>
                </div>
            </div>
        @endforeach
    @endif
</div>

<script>
    let currentIndex = 0;

    function showSlide(index) {
        const carouselImages = document.querySelector('.carousel-images');
        const totalSlides = document.querySelectorAll('.carousel-images img').length;

        if (index >= totalSlides) {
            currentIndex = 0; // Loop back to the first image
        } else if (index < 0) {
            currentIndex = totalSlides - 1; // Loop back to the last image
        } else {
            currentIndex = index;
        }

        const offset = -currentIndex * 100; // Calculate the offset
        carouselImages.style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    // Initialize the carousel
    showSlide(currentIndex);
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function openReportModal() {
        Swal.fire({
            title: 'Report Item',
            text: 'Please select a reason for reporting this item:',
            input: 'select',
            inputOptions: {
                'Violation of Terms': 'Violation of Terms',
                'Inappropriate Behavior': 'Inappropriate Behavior',
                'Fraudulent Activity': 'Fraudulent Activity',
                'Other': 'Other',
            },
            inputPlaceholder: 'Select a reason',
            showCancelButton: true,
            confirmButtonText: 'Submit Report',
            cancelButtonText: 'Cancel',
            preConfirm: (reason) => {
                if (!reason) {
                    Swal.showValidationMessage('Please select a reason to continue.');
                } else {
                    document.getElementById('reportReason').value = reason;
                    document.getElementById('reportForm').submit();
                }
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Success Message -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
</script>
@endif

<!-- SweetAlert Error Message (Optional) -->
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: "{{ session('error') }}",
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
    });
</script>

@endif

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

    </script>

</body>
</html>
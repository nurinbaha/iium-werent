<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Wishlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- SweetAlert2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

.add-post-btn {
    margin-right: 20px; /* Adds spacing from the edge */
}

.add-post-btn a {
    display: inline-block; /* Fixes button alignment */
    color: #ffffff;
    background-color: #f1c40f;
    padding: 8px 15px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.9rem; /* Match font size */
    font-weight: bold; /* Optional: Makes text bold */
    line-height: normal; /* Fixes stretched appearance */
}

.add-post-btn a:hover {
    background-color: #0a73a6;
    color: #ffffff;
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
                <li><a href="{{ url('/rent-history') }}"><i class="fas fa-history"></i> Rent History</a></li>
                <li><a href="{{ url('/notifications') }}"><i class="fas fa-bell"></i> Notifications</a></li>
                <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
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

            <!-- Wishlist Section -->
            <div class="wishlist-section">
                <h2>Your Wishlist</h2>
                @if($wishlistItems->isNotEmpty())
                    @foreach($wishlistItems as $wishlist)
                        @if($wishlist->item) <!-- Ensure the item exists -->
                        <div class="item-card">
                            <img src="{{ asset('storage/' . $wishlist->item->item_image) }}" alt="{{ $wishlist->item->item_name }}">
                            <div class="item-details">
                                <h3>{{ $wishlist->item->item_name }}</h3>
                                <p>Category: {{ ucfirst($wishlist->item->category) }}</p>
                                <p>RM{{ $wishlist->item->price }}</p>
                            </div>
                            <div class="item-actions">
                                <a href="{{ route('item.show', $wishlist->item->id) }}" class="btn btn-info">View Item</a>
                                <form action="{{ route('wishlist.remove', $wishlist->item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                        @else
                            <p>Item not available anymore.</p>
                        @endif
                    @endforeach
                @else
                    <p>Your wishlist is empty. Start adding some items!</p>
                @endif
            </div>
        </div>
    </div>
    <!-- SweetAlert for Session Messages -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A Post - IIUM WeRent</title>
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
            margin-left: 10px;
        }

        .header .add-post-btn a {
            color: #ffffff;
            background-color: #f1c40f;
            padding: 8px 15px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 1rem;
        }

        .header .add-post-btn a:hover {
            background-color: #0a73a6;
        }

        /* Add Post Form Layout */
        .add-post-form-layout {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
            gap: 50px; /* Increase space between image upload and form */
        }

        .add-post-image-upload {
            width: 30%; /* Adjust width of the image upload section */
            text-align: center;
        }

        .add-post-image-upload img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
        }

        .add-post-image-upload input[type="file"] {
            margin-top: 10px;
        }

        .add-post-form-fields {
            width: 400px; /* Widen the form */
        }

        .add-post-form-group {
            margin-bottom: 15px;
        }

        .add-post-form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .add-post-form-group input,
        .add-post-form-group select,
        .add-post-form-group textarea {
            width: 100%;
            padding: 8px; /* Reduced padding for better proportions */
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .add-post-form-group textarea {
            resize: vertical;
        }

        .add-post-submit-btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-post-submit-btn:hover {
            background-color: #218838;
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
                <h1>IIUM WeRent</h1>
            </div>

            <!-- Page Title Section -->
            <div class="page-title">
            <h2 style="margin-top: 70px; font-size:30px; text-align: left; color: black;">
                Add a post :
            </h2>
            </div>

            <!-- Add Post Form Section -->
            <!--
            <div class="add-post-form-layout">
                <!-- Image Upload Section 
                <div class="add-post-image-upload">
                    <label for="item-image">
                        <img src="{{ asset('images/placeholder-image.png') }}" alt="Placeholder Image" class="image-placeholder">
                        <p>Upload an image</p>
                    </label>
                    <input type="file" id="item-image" name="item_image" accept="image/*">
                </div> --> 

                <!-- Form Fields Section -->
                <div class="add-post-form-fields">
                    <div class="add-post-user-info">
                        <p><strong>{{ Auth::user()->name }}</strong></p>
                        <p>{{ Auth::user()->email }}</p>
                    </div>

                    <form action="{{ url('/posts/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="add-post-form-group">
                            <label for="item_image">Upload an Image:</label>
                            <input type="file" id="item_image" name="item_image" accept="image/*" required>
                        </div>

                        <div class="add-post-form-group">
                            <label for="item-name">Item Name:</label>
                            <input type="text" id="item-name" name="item_name" placeholder="Enter item name" required>
                        </div>

                        <div class="add-post-form-group">
                            <label for="price">Price per day (RM):</label>
                            <input type="number" id="price" name="price" placeholder="Enter price per day" required>
                        </div>

                        <div class="add-post-form-group">
                            <label for="category">Category:</label>
                            <select id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="fashion">Fashion</option>
                                <option value="home-living">Home & Living</option>
                                <option value="books-stationaries">Books & Stationaries</option>
                                <option value="sports-equipment">Sports Equipment</option>
                                <option value="mobile-electronics">Mobile & Electronics</option>
                                <option value="free-items">Free Items</option>
                                <option value="others">Others</option>
                            </select>
                        </div>

                        <div class="add-post-form-group">
                            <label for="location">Location:</label>
                            <select id="location" name="location" required>
                            <option value="">Location</option>
                            <option value="Mahallah Zubair">Mahallah Zubair</option>
                            <option value="Mahallah Uthman">Mahallah Uthman</option>
                            <option value="Mahallah Faruq">Mahallah Faruq</option>
                            <option value="Mahallah Bilal">Mahallah Bilal</option>
                            <option value="Mahallah Siddiq">Mahallah Siddiq</option>
                            <option value="Mahallah Salahuddin">Mahallah Salahuddin</option>
                            <option value="Mahallah Aminah">Mahallah Aminah</option>
                            <option value="Mahallah Asiah">Mahallah Asiah</option>
                            <option value="Mahallah Hafsa">Mahallah Hafsa</option>
                            <option value="Mahallah Asma">Mahallah Asma</option>
                            <option value="Mahallah Ruqayyah">Mahallah Ruqayyah</option>
                            <option value="Mahallah Halimah">Mahallah Halimah</option>
                            <option value="Mahallah Maryam">Mahallah Maryam</option>
                            <option value="Mahallah Nusaibah">Mahallah Nusaibah</option>
                            <option value="Mahallah Sumayyah">Mahallah Sumayyah</option>
                            <option value="Mahallah Safiyyah">Mahallah Safiyyah</option>
                        </select>
                        </div>

                        <div class="add-post-form-group">
                            <label for="pickup-method">Pickup Method:</label>
                            <input type="text" id="pickup-method" name="pickup_method" placeholder="Enter pickup method" required>
                        </div>

                        <div class="add-post-form-group">
                            <label for="item_description">Description:</label>
                            <textarea id="item_description" name="item_description" placeholder="Enter item description" rows="4" required></textarea>
                        </div>

                        <div class="add-post-form-group">
                            <button type="submit" class="add-post-submit-btn">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

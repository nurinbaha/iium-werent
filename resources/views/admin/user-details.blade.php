<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        /* Profile Section */
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px;
        }

        .profile-image {
            width: 350px;
            height: 350px;
            border-radius: 0; /* Square shape */
            margin-right: 40px;
            object-fit: cover;
        }

        .user-info table {
            width: 100%;
            max-width: 400px;
            border-collapse: collapse;
        }

        .user-info table th, .user-info table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .user-info table th {
            background-color: #007bff;
            color: white;
            text-align: left;
        }

        .user-info table td {
            background-color: white;
        }

        /* Suspend and Unsuspend Buttons */
        .suspend-button, .unsuspend-button {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 20px;
            text-align: center;
            transition: background-color 0.2s ease;
        }

        .suspend-button {
            background-color: #dc3545;
        }

        .suspend-button:hover {
            background-color: #c82333;
        }

        .unsuspend-button {
            background-color: #28a745;
        }

        .unsuspend-button:hover {
            background-color: #218838;
        }

        /* Items Section */
        .user-items-section {
            margin-top: 40px;
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

        .item-details h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        .item-details p {
            margin: 5px 0;
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
                <li><a href="{{ url('/admin/reports') }}"><i class="fas fa-exclamation-circle"></i> Reports</a></li>
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
                <h2 style="margin-top: 70px; font-size: 30px; text-align: left; color: black;">
                    Profile / {{ $user->name }}
                </h2>
            </div>

            <!-- Profile Section -->
            <div class="profile-container">
                <img src="{{ asset($user->user_image ?? 'images/profiles/profile.png') }}" alt="User Image" class="profile-image">
                <div class="user-info">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $user->status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Suspension Status</th>
                            <td>
                                @if($user->is_suspended)
                                    <span style="color: red; font-weight: bold;">Suspended</span>
                                @else
                                    <span style="color: green; font-weight: bold;">Active</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <!-- Suspend or Unsuspend Button -->
                    @if($user->is_suspended)
                        <!-- Unsuspend User Button -->
                        <form action="{{ route('admin.unsuspend-user', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="unsuspend-button">Unsuspend User</button>
                        </form>
                    @else
                        <!-- Suspend User Button -->
                        <button type="button" class="suspend-button" onclick="openSuspendPopup('suspend', '{{ route('admin.suspend-user', ['id' => $user->id]) }}')">Suspend User</button>
                    @endif

                </div>
            </div>

            <!-- Listings Section -->
            <div class="user-items-section">
                <h2>Listings</h2>
                @if($userItems->isEmpty())
                    <p>No items available.</p>
                @else
                    @foreach($userItems as $item)
                        <a href="{{ route('admin.item.details', ['id' => $item->id]) }}" class="item-link">
                            <div class="item-card">
                                <img src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->item_name }}" class="item-image">
                                <div class="item-details">
                                    <h3>{{ $item->item_name }}</h3>
                                    <p>RM{{ $item->price }}/day</p>
                                    <p>{{ $item->created_at->format('d M Y , H:i') }}</p>
                                    <p>{{ $item->location }}</p>
                                    <p>Category: {{ ucfirst($item->category) }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

        </div>
    </div>

    <!-- Suspend/Unsuspend Confirmation Popup -->
    <div id="suspendPopup" class="delete-popup" style="display: none; justify-content: center; align-items: center; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 999;">
        <div class="delete-popup-content" style="background-color: white; padding: 20px; border-radius: 10px; width: 400px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <h3 id="suspendPopupTitle" style="margin-bottom: 20px; font-size: 18px; font-weight: bold;">Are you sure you want to suspend this user?</h3>
            <form id="suspendForm" method="POST">
                @csrf
                <label for="suspend_reason" style="display: block; font-size: 14px; margin-bottom: 10px; text-align: left;">Reason for Suspension:</label>
                <select id="suspend_reason" name="suspend_reason" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                    <option value="" disabled selected>Select a reason</option>
                    <option value="Violation of terms">Violation of Terms</option>
                    <option value="Inappropriate behavior">Inappropriate Behavior</option>
                    <option value="Fraudulent activity">Fraudulent Activity</option>
                    <option value="Other">Other</option>
                </select>
                <button type="submit" class="confirm-button" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; margin-right: 10px; transition: background-color 0.2s ease;">
                    Confirm
                </button>
                <button type="button" class="cancel-button" onclick="closeSuspendPopup()" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; transition: background-color 0.2s ease;">
                    Cancel
                </button>
            </form>
        </div>
    </div>

    <script>
        function openSuspendPopup(action, route) {
            const title = action === 'suspend'
                ? 'Are you sure you want to suspend this user?'
                : 'Are you sure you want to unsuspend this user?';
            document.getElementById('suspendPopupTitle').innerText = title;
            document.getElementById('suspendForm').action = route;
            document.getElementById('suspendPopup').style.display = 'flex';
        }

        function closeSuspendPopup() {
            document.getElementById('suspendPopup').style.display = 'none';
        }
    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
    </script>
    @endif

</body>
</html>

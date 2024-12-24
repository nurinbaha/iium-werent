<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Items - Admin</title>
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

        /* Breadcrumb */
        .breadcrumb {
            margin-top: 0px;
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

        .main-content {
    margin-left: 200px; /* Adjust to align with the sidebar */
    padding: 20px;
    margin-top: 60px; /* Adjust this value to ensure content starts below the fixed header */
    background-color: #f8f9fa; /* Optional background color */
    min-height: 100vh;
}


        .item-container {
    display: flex;
    justify-content: flex-start; /* Pastikan kandungan selari ke kiri */
    align-items: flex-start; /* Kandungan sejajar di atas */
    gap: 30px; /* Jarak antara imej dan maklumat */
    padding: 30px;
    margin-left: 200px; /* Pastikan jauh dari sidebar */
}

.item-image {
    width: 40%;
}

.item-image img {
    width: 100%;
    height: auto; /* Kekalkan nisbah imej */
    border-radius: 10px;
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
        .item-card {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .item-card img {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            object-fit: cover;
            border-radius: 8px;
        }

        .item-details {
            flex: 1;
        }

        .item-details h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .item-details p {
            margin: 5px 0;
            color: #555;
        }

        .btn-view {
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .btn-view:hover {
            background-color: #c82333;
        }

        .content-header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
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
                    Reports
                </h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($reportedItems->isEmpty())
                <p>No reported items found.</p>
            @else
                @foreach($reportedItems as $report)
                    <div class="item-card">
                        <img src="{{ asset('storage/' . $report->item->item_image) }}" alt="{{ $report->item->item_name }}">
                        <div class="item-details">
                            <h3>{{ $report->item->item_name }}</h3>
                            <p><strong>Reported Reason:</strong> {{ $report->reason }}</p>
                            <p><strong>Reported By:</strong> {{ $report->user->name ?? 'N/A' }}</p>
                            <a href="{{ route('admin.report.details', $report->item_id) }}" class="btn-view">View Details</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>

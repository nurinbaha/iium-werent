<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Users - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Reuse the same styles from the item reports page */
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

        .main-content {
            margin-left: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Item Card Styling */
        .item-card {
    display: flex;
    justify-content: space-between; /* Add this */
    align-items: center;
    background-color: #fff;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.item-details {
    flex-grow: 1; /* Allows the details to take up remaining space */
}

        .item-card img {
            width: 300px;
            height: 300px;
            margin-right: 20px;
            border-radius: 4px;
        }

        .item-card .item-info {
            font-size: 16px;
        }

        .btn-view {
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-left: 20px;
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

        .dashboard-container {
            margin-left: 180px;
            margin-top: 40px;
            padding: 20px;
            background-color: #ffffff;
            min-height: calc(100vh - 40px);
            width: calc(100% - 180px);
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar (Same as previous pages) -->
        <div class="sidebar">
            <h2>IIUM WeRent</h2>
            <ul>
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ url('/admin/users') }}"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="{{ url('/admin/listings') }}"><i class="fas fa-list"></i> Listings</a></li>
                <li>
                    <a href="#" id="reports-link">
                        <i class="fas fa-exclamation-circle"></i> Reports 
                        <i class="fas fa-chevron-down" id="reports-arrow" style="margin-left: 8px;"></i>
                    </a>
                    <ul class="nav" id="reports-sections" style="display: none;">
                        <!-- Item Reports Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/reports') }}">Item Reports</a>
                        </li>
                        <!-- User Reports Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/user-reports') }}">User Reports</a>
                        </li>
                    </ul>
                </li>
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
                <h2 style="margin-top: 40px; font-size: 30px; text-align: left; color: black;">
                    User Reports
                </h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($reportedUsers->isEmpty())
                <p>No user reports found.</p>
            @else
                @foreach($reportedUsers as $report)
                <div class="item-card">
                    @php
                        // Ensure the $user variable is defined from the $report object
                        $user = $report->reportedUser ?? null;
                    @endphp

                    @if($user)
                        <img src="{{ asset($user->user_image ? 'storage/' . $user->user_image : 'images/profiles/profile.png') }}" alt="User Photo" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover;">
                        <div class="item-details">
                            <h3>{{ $user->name }}</h3>
                            <p><strong>Reported Reason:</strong> {{ $report->reason }}</p>
                            <p><strong>Reported Details:</strong> {{ $report->details ?? 'No additional details provided' }}</p>
                            <p><strong>Reported By:</strong> {{ $report->reporter->name ?? 'N/A' }}</p>
                            <p><strong>Reporter Email:</strong> {{ $report->reporter->email ?? 'N/A' }}</p>
                        </div>
                        <a href="{{ route('admin.user.details', $user->id) }}" class="btn-view">View User</a>
                    @else
                        <p>User not available.</p>
                    @endif
                </div>
                @endforeach
            @endif
        </div>

    </div>

    <script>
        // Function to mark a report as resolved
        function markAsResolved(reportId) {
            Swal.fire({
                title: 'Mark as Resolved',
                text: 'Are you sure you want to mark this report as resolved?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Mark as Resolved'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform your AJAX call or form submission here
                    Swal.fire(
                        'Resolved!',
                        'The report has been marked as resolved.',
                        'success'
                    );
                }
            });
        }

        // Function to delete a report
        function deleteReport(reportId) {
            Swal.fire({
                title: 'Delete Report',
                text: 'Are you sure you want to delete this report?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform your AJAX call or form submission here
                    Swal.fire(
                        'Deleted!',
                        'The report has been deleted.',
                        'success'
                    );
                }
            });
        }

        // Toggle Reports Section
        document.getElementById('reports-link').addEventListener('click', function () {
            toggleSection('reports-sections', 'reports-arrow');
        });

        // Generic Function to Toggle Sections
        function toggleSection(sectionId, arrowId) {
            var section = document.getElementById(sectionId);
            var arrow = document.getElementById(arrowId);

            if (section.style.display === "none" || section.style.display === "") {
                section.style.display = "block";
                arrow.classList.add('rotate-down'); // Add a CSS class for the down arrow
            } else {
                section.style.display = "none";
                arrow.classList.remove('rotate-down'); // Remove the class for the default arrow
            }
        }
    </script>
</body>

</html>

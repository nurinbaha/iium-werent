<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM WeRent - Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
            /* Body with background image */
    body {
        margin: 0;
        height: 100vh;
        background: 
            linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
            url('/storage/images/landing_background.jpg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

        /* Center the login card */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-header {
            margin-bottom: 20px;
        }

        .logo {
            width: 130px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 1.5em;
            color: #007bff;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #555;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .divider {
            margin: 20px 0;
            font-size: 12px;
            color: #aaa;
        }

        .btn-admin {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-admin:hover {
            background-color: #000;
        }

        /* Success Message Styling */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }

    </style>
</head>
<body>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <!-- Logo Image -->
                <img src="{{ asset('images/logo.png') }}" alt="IIUM WeRent Logo" class="logo">
                <h1>Hello, User! <br>Welcome to IIUM WeRent</h1>
                <p style="font-size:14px;">Enter your live email to log in:</p>
            </div>

            <!-- Flash Message -->
            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ url('login') }}">
                @csrf
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="email@live.iium.edu.my" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>

            <div class="divider">---- or Login as Admin ----</div>
            
            <form method="GET" action="{{ url('admin/login') }}">
                <button type="submit" class="btn-admin">Admin</button>
            </form>
        </div>
    </div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('suspended'))
            Swal.fire({
                title: 'Account Suspended',
                text: "{{ session('suspended') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>


    <!-- JavaScript for auto-hiding the success message after 3 seconds -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var alertMessage = document.querySelector('.alert-success');
            if (alertMessage) {
                setTimeout(function () {
                    alertMessage.style.display = 'none';
                }, 3000); // Hides the message after 3 seconds
            }
        });
    </script>
</body>
</html>

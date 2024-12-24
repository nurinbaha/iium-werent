<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM Werent</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Basic styling for the landing page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #333;
            padding: 20px;
        }
        .header .title {
            color: #fff;
            font-size: 1.5em;
            font-weight: bold;
        }
        .header a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
        }
        .header .login {
            background: #007bff;
        }
        .header .signup {
            background: #28a745;
        }
        .hero {
            background: url('/images/hero-bg.jpg') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            padding: 100px 20px;
        }
        .features {
            display: flex;
            justify-content: space-around;
            padding: 50px 20px;
            background: #f9f9f9;
        }
        .feature-item {
            max-width: 300px;
            text-align: center;
        }
        .cta {
            background: #333;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
        }
        .cta a {
            color: #fff;
            text-decoration: none;
            background: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Header with title and Login/Sign Up buttons -->
    <div class="header">
        <div class="title">IIUM Werent</div>
        <div>
            <a href="{{ route('login') }}" class="login">Login</a>
            <a href="{{ route('signup.create') }}" class="signup">Sign Up</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to IIUM Werent</h1>
        <p>Your go-to platform for rental solutions at IIUM!</p>
        <a href="#features" class="btn-primary">Explore Features</a>
    </div>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="feature-item">
            <h2>Easy Rentals</h2>
            <p>Find and rent items quickly and easily within the IIUM community.</p>
        </div>
        <div class="feature-item">
            <h2>Secure Transactions</h2>
            <p>Enjoy a secure and transparent rental process with trusted IIUM members.</p>
        </div>
        <div class="feature-item">
            <h2>Community Support</h2>
            <p>Access support from our dedicated team and the IIUM community.</p>
        </div>
    </section>

    <!-- Call-to-Action Section -->
    <section class="cta">
        <h2>Get Started with IIUM Werent Today!</h2>
        <a href="{{ route('signup.create') }}">Sign Up Now</a>
    </section>
</body>
</html>

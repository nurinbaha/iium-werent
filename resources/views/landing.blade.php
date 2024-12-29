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
    background: url('/storage/images/iium-background.jpg') no-repeat center fixed;
    background-size: cover;
    background-position: center 110%;
    height: 100vh; /* Full screen height */
    display: flex;
    flex-direction: column;
}

.hero {
    background: linear-gradient(
            rgba(0, 0, 0, 0.1), /* Adjusted alpha for less opacity */
            rgba(0, 0, 0, 0.1) /* Same here */
        ),
        url('/storage/images/iium-background.jpg') no-repeat center center/cover;
    color: #fff;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 80%; /* Reduced height for better balance */
    padding: 20px 100px; /* Adjust padding for better spacing */
}


.hero h1 {
    font-size: 3rem; /* Increase heading size */
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Add subtle shadow for contrast */
    margin-bottom: 15px;
}

.hero p {
    font-size: 1.2rem; /* Adjust paragraph size */
    margin-bottom: 20px;
}

.hero h1,
.hero p,
.hero-btn {
    animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}



.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #333;
    padding: 10px 20px;
    margin-bottom: 0px;
    height: 12%; /* Allocate 10% for the header */
}
        .header .title {
            color: #fff;
            font-size: 1.8em;
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
            padding: 0px 20px;
        }

        
        .features {
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: auto; /* Allow content to take its natural height */
    padding: 10px;
    margin-top: 50px; /* Pull the features section closer to the hero section */
    margin-bottom: 50px; /* Pull the features section closer to the hero section */
}

.feature-item {
    max-width: 250px;
    text-align: center;
    font-size: 14px;
    background: rgba(255, 255, 255, 0.9); /* Light, semi-transparent background for the box */
    padding: 20px;
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    color: #333; /* Darker text color for contrast */
}

.feature-item h2 {
    margin-bottom: 15px;
    font-size: 18px;
    color: #007bff; /* Optional: A pop of color for headings */
}

.feature-item p {
    font-size: 14px;
}

.cta {
    background: #333;
    color: #fff;
    text-align: center;
    height: 15%; /* Allocate 10% for the call-to-action */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;
    font-size: 0.9em;
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
    </div>

    <section id="features" class="features">
    <div class="feature-item">
        <h2>Seamless Rentals</h2>
        <p>Browse, book, and rent items with ease, tailored for the IIUM community.</p>
    </div>
    <div class="feature-item">
        <h2>Hassle-Free Process</h2>
        <p>Enjoy a streamlined and efficient rental experience with trusted IIUM peers.</p>
    </div>
    <div class="feature-item">
        <h2>Trusted Connections</h2>
        <p>Connect with fellow IIUM members for a reliable and friendly rental environment.</p>
    </div>
</section>

    <!-- Call-to-Action Section -->
    <section class="cta">
        <h2>Get Started with IIUM Werent Today!</h2>
        <a href="{{ route('signup.create') }}">Sign Up Now</a>
    </section>
</body>
</html>
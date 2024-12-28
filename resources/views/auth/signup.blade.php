<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - IIUM WeRent</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-y: auto;
        }

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 20px;
        }

        .signup-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #343a40;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }

        .form-group label .required-symbol {
            color: #dc3545;
            margin-left: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .password-note {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .form-group .error {
            color: #dc3545;
            font-size: 12px;
        }

        .form-group .success-message {
            color: #28a745;
            font-size: 12px;
        }

        .terms {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .terms input {
            margin-right: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        border-radius: 8px;
        width: 80%; /* Could be more or less, depending on screen size */
        max-width: 500px;
    }

    /* Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }
</style>    
</head>
<body>
    <div class="signup-container">
        <div class="signup-card">
            <h2>Create Your Account</h2>
            
            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            <form action="{{ route('signup.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name: <span class="required-symbol">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email: <span class="required-symbol">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number: <span class="required-symbol">*</span></label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
                    @error('phone_number') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Gender: <span class="required-symbol">*</span></label>
                    <select name="gender" id="gender" required>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status: <span class="required-symbol">*</span></label>
                    <select name="status" id="status" required>
                        <option value="student" {{ old('status') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="staff" {{ old('status') == 'staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                    @error('status') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="location">Location: <span class="required-symbol">*</span></label>
                    <select name="location" id="location" required>
                        <option value="">Select Location</option>
                        <option value="Mahallah Ali" {{ old('location') == 'Mahallah Ali' ? 'selected' : '' }}>Mahallah Ali</option>
                        <option value="Mahallah Zubair" {{ old('location') == 'Mahallah Zubair' ? 'selected' : '' }}>Mahallah Zubair</option>
                        <option value="Mahallah Uthman" {{ old('location') == 'Mahallah Uthman' ? 'selected' : '' }}>Mahallah Uthman</option>
                        <option value="Mahallah Faruq" {{ old('location') == 'Mahallah Faruq' ? 'selected' : '' }}>Mahallah Faruq</option>
                        <option value="Mahallah Bilal" {{ old('location') == 'Mahallah Bilal' ? 'selected' : '' }}>Mahallah Bilal</option>
                        <option value="Mahallah Siddiq" {{ old('location') == 'Mahallah Siddiq' ? 'selected' : '' }}>Mahallah Siddiq</option>
                        <option value="Mahallah Salahuddin" {{ old('location') == 'Mahallah Salahuddin' ? 'selected' : '' }}>Mahallah Salahuddin</option>
                        <option value="Mahallah Aminah" {{ old('location') == 'Mahallah Aminah' ? 'selected' : '' }}>Mahallah Aminah</option>
                        <option value="Mahallah Asiah" {{ old('location') == 'Mahallah Asiah' ? 'selected' : '' }}>Mahallah Asiah</option>
                        <option value="Mahallah Hafsa" {{ old('location') == 'Mahallah Hafsa' ? 'selected' : '' }}>Mahallah Hafsa</option>
                        <option value="Mahallah Asma" {{ old('location') == 'Mahallah Asma' ? 'selected' : '' }}>Mahallah Asma</option>
                        <option value="Mahallah Ruqayyah" {{ old('location') == 'Mahallah Ruqayyah' ? 'selected' : '' }}>Mahallah Ruqayyah</option>
                        <option value="Mahallah Halimah" {{ old('location') == 'Mahallah Halimah' ? 'selected' : '' }}>Mahallah Halimah</option>
                        <option value="Mahallah Maryam" {{ old('location') == 'Mahallah Maryam' ? 'selected' : '' }}>Mahallah Maryam</option>
                        <option value="Mahallah Nusaibah" {{ old('location') == 'Mahallah Nusaibah' ? 'selected' : '' }}>Mahallah Nusaibah</option>
                        <option value="Mahallah Sumayyah" {{ old('location') == 'Mahallah Sumayyah' ? 'selected' : '' }}>Mahallah Sumayyah</option>
                        <option value="Mahallah Safiyyah" {{ old('location') == 'Mahallah Safiyyah' ? 'selected' : '' }}>Mahallah Safiyyah</option>
                    </select>
                    @error('location') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password: <span class="required-symbol">*</span></label>
                    <input type="password" name="password" id="password" required>
                    <div class="password-note">Password must be at least 8 characters long.</div>
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password: <span class="required-symbol">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>

                <div class="terms">
    <input type="checkbox" name="terms" id="terms" required>
    <label for="terms">
        I agree to the <a href="#" id="tandc-link">terms and conditions</a> and understand my information will be used accordingly.
    </label>
</div>

<!-- T&Cs Modal -->
<div id="tandc-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Terms and Conditions</h3>
        <p>
            <!-- Add your terms and conditions here -->
            1. By signing up, you agree to provide accurate and truthful information.<br>
            2. Your information will only be used for the purposes stated.<br>
            3. You agree to comply with all platform rules and policies.<br>
            4. Data privacy will be respected as per our privacy policy.<br>
            5. Misuse of the platform may result in account suspension or termination.
        </p>
    </div>
</div>

                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <script>
    // Get modal elements
    const modal = document.getElementById("tandc-modal");
    const link = document.getElementById("tandc-link");
    const closeBtn = document.querySelector(".close");

    // Open modal when clicking the link
    link.addEventListener("click", function (event) {
        event.preventDefault();
        modal.style.display = "block";
    });

    // Close modal when clicking the close button
    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Close modal when clicking anywhere outside the modal content
    window.addEventListener("click", function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - IIUM WeRent</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up for IIUM WeRent</h2>
        
        @if(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('signup.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
                @error('phone_number') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="student" {{ old('status') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="staff" {{ old('status') == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
                @error('status') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required>
                @error('location') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>

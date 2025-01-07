<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="main-container">
        @include('partials.sidebar') <!-- Your sidebar can go in a separate file for reuse -->
        <div class="content">
            @yield('content')
            @yield('scripts')
        </div>
    </div>
</body>
</html>

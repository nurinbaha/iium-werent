<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IIUM WeRent')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="main-container">
        @include('partials.sidebar') <!-- Your sidebar can go in a separate file for reuse -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>

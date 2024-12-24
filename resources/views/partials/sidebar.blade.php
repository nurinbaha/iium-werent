<!-- resources/views/partials/sidebar.blade.php -->
<div class="sidebar">
    <h2>IIUM WeRent</h2>
    <ul>
        <li><a href="{{ url('/dashboard') }}">Home</a></li>
        <li><a href="{{ url('/categories') }}">Categories</a></li>
        <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
        <li><a href="{{ url('/rent-history') }}">Rent History</a></li>
        <li><a href="{{ url('/notifications') }}">Notifications</a></li>
        <li><a href="{{ url('/profile') }}">Profile</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
    </ul>
</div>

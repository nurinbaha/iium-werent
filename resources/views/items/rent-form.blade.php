@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rent Item: {{ $item->item_name }}</h1>
    <p>Price per day: RM {{ number_format($item->price, 2) }}</p>
    <p>Location: {{ $item->location }}</p>

    <form action="{{ route('item.rent.confirm', $item->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Total Days</label>
            <input type="text" id="total_days" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Total Price</label>
            <input type="text" id="total_price" class="form-control" readonly>
        </div>
        <button type="submit" class="btn btn-success">Confirm Rent</button>
    </form>
</div>

<script>
document.getElementById('start_date').addEventListener('change', calculateTotal);
document.getElementById('end_date').addEventListener('change', calculateTotal);

function calculateTotal() {
    const startDate = new Date(document.getElementById('start_date').value);
    const endDate = new Date(document.getElementById('end_date').value);
    if (startDate && endDate && endDate > startDate) {
        const totalDays = (endDate - startDate) / (1000 * 60 * 60 * 24);
        const pricePerDay = {{ $item->price }};
        document.getElementById('total_days').value = totalDays;
        document.getElementById('total_price').value = (totalDays * pricePerDay).toFixed(2);
    } else {
        document.getElementById('total_days').value = '';
        document.getElementById('total_price').value = '';
    }
}
</script>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Confirm Your Rent Request</h1>
    <p><strong>Item Name:</strong> {{ $item->item_name }}</p>
    <p><strong>Price per day:</strong> RM {{ number_format($item->price, 2) }}</p>
    <p><strong>Start Date:</strong> {{ $start_date }}</p>
    <p><strong>End Date:</strong> {{ $end_date }}</p>
    <p><strong>Total Days:</strong> {{ $total_days }}</p>
    <p><strong>Total Price:</strong> RM {{ number_format($total_price, 2) }}</p>
    <p><strong>Final Price (Including Deposit):</strong> RM {{ number_format($final_price, 2) }}</p>
    <p class="text-danger"><em>* The price includes a refundable deposit equivalent to the total rent price.</em></p>

    <div>
        <input type="checkbox" id="agreeTnC" name="agreeTnC">
        <label for="agreeTnC">
            By agreeing to these Terms & Conditions, you acknowledge that you have read, understood, and agree to be bound by the policies governing this rental. This includes adherence to payment obligations, proper care of the rented item, and the return of the item in the condition it was provided. Failure to comply may result in additional charges or penalties as outlined in the agreement. 
            <a href="/terms-and-conditions" target="_blank">Terms & Conditions</a>
        </label>
    </div>

    <form id="confirmRentForm" action="{{ route('item.rent.submit', $item->id) }}" method="POST">
        @csrf
        <input type="hidden" name="start_date" value="{{ $start_date }}">
        <input type="hidden" name="end_date" value="{{ $end_date }}">
        <input type="hidden" name="total_days" value="{{ $total_days }}">
        <input type="hidden" name="final_price" value="{{ $final_price }}">
        <button type="submit" class="btn btn-success">Confirm Rent</button>
    </form>
</div>

<!-- Include SweetAlert2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Prevent form submission unless the checkbox is ticked
    document.getElementById('confirmRentForm').addEventListener('submit', function (event) {
        const termsCheckbox = document.getElementById('agreeTnC');
        if (!termsCheckbox.checked) {
            event.preventDefault(); // Prevent the form from submitting
            // Show a SweetAlert2 popup instead of alert
            Swal.fire({
                icon: 'error',
                title: 'Terms & Conditions',
                text: 'You must agree to the Terms & Conditions before confirming the rent.',
                confirmButtonText: 'OK'
            });
        }
    });
</script>
@endsection

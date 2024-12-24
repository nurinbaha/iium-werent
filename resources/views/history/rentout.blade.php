@extends('layouts.app')

<style>
.btn {
    padding: 8px 12px;
    border: none;
    color: white;
    background-color: #007bff;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

</style>

@section('content')

    <h1>Rent Out History</h1>
    @if($rentOutHistory->isEmpty())
        <p>No rent-out history found.</p>
    @else
        <ul>
            @foreach($rentOutHistory as $history)
                <li>
                    <strong>Item: {{ $history->item->item_name }}</strong><br>
                    Rent Duration: {{ $history->start_date }} to {{ $history->end_date }} ({{$history->total_days}} days)<br>
                    Status: {{ ucfirst($history->status) }}<br>
                    Total Price: RM {{ number_format($history->total_price, 2) }}<br>
                    Final Price: RM {{ number_format($history->final_price, 2) }}<br>

                    @if($history->status === 'rented')
                        <form action="{{ route('rentOutHistory.markReturned', $history->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Returned</button>
                        </form>
                    @elseif($history->status === 'returned' && is_null($history->renter_review))
                        <form action="{{ route('rentOutHistory.submitReview', $history->id) }}" method="POST">
                            @csrf
                            <div>
                                <label for="renter_review">Write a Review:</label><br>
                                <textarea id="renter_review" name="renter_review" rows="3" cols="50" placeholder="Enter your review" required></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-secondary">Submit Review</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

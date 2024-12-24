<div class="container">
    <h1>Notifications</h1>
    <div class="row">
        <!-- Rent Section -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Rent Notifications</h3>
                </div>
                <div class="card-body">
                    @if($rentNotifications->isEmpty())
                        <p>No rent notifications available.</p>
                    @else
                        <ul class="list-group">
                        @foreach($rentNotifications as $rentNotification)
                            <li class="list-group-item">
                            <p><strong>Item:</strong> <a href="{{ route('items.show', ['id' => $rentNotification->item->id]) }}">{{ $rentNotification->item->item_name }}</a></p>
                            <p><strong>Message:</strong> {{ $rentNotification->message }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($rentNotification->status) }}</p>
                            <p><strong>Start Date:</strong> {{ $rentNotification->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $rentNotification->end_date }}</p>
                            <p><strong>Total Days:</strong> {{ $rentNotification->total_days }}</p>
                            <p><strong>Total Price (without deposit):</strong> RM {{ number_format($rentNotification->total_price, 2) }}</p>
                            <p><strong>Final Price (with deposit):</strong> RM {{ number_format($rentNotification->final_price, 2) }}</p>
                        </li>

                         <!-- Show Proceed to Chat Button for Approved Notifications -->
                            @if($rentNotification->status === 'approved')
                                <form action="{{ route('chat.proceed', $rentNotification->id) }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Proceed to Chat</button>
                                </form>
                            @endif
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

       
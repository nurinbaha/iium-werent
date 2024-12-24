 <!-- Rent Out Section -->
 <div class="container">
    <h1>Rent Out Notifications</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3>Rent Out Notifications</h3>
                </div>
                <div class="card-body">
                    @if($rentOutNotifications->isEmpty())
                        <p>No rent out notifications available.</p>
                    @else
                        <ul class="list-group">
                            @foreach($rentOutNotifications as $rentOutNotification)
                                <li class="list-group-item">
                                    <strong>Rent request for item: <a href="{{ route('items.show', ['id' => $rentOutNotification->item->id]) }}">{{ $rentOutNotification->item->item_name }}</a></strong>
                                    <p>Status: {{ ucfirst($rentOutNotification->status) }}</p>
                                    <p>Requested by: <a href="{{ route('user.profile', ['id' => $rentOutNotification->renter->id]) }}">{{ $rentOutNotification->renter->name }}</a></p>
                                    <p>Start Date: {{ $rentOutNotification->start_date }}</p>
                                    <p>End Date: {{ $rentOutNotification->end_date }}</p>
                                    <p>Total Days: {{ $rentOutNotification->total_days }}</p>
                                    <p>Total Price (without deposit): RM {{ number_format($rentOutNotification->total_price, 2) }}</p>
                                    <p>Final Price (with deposit): RM {{ number_format($rentOutNotification->final_price, 2) }}</p>
                                    <form method="POST" action="{{ route('notifications.approve', $rentOutNotification->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form method="POST" action="{{ route('notifications.decline', $rentOutNotification->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Decline</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

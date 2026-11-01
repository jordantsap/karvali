<table class="table table-bordered">
    <thead>
    <tr>
        <th>Guest</th>
        <th>Offer</th>
        <th>Dates</th>
        <th>Details</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse ($bookings as $booking)
        <tr>
            <td>
                {{ $booking->name }}<br>
                <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a>
                @if($booking->phone)<br>{{ $booking->phone }}@endif
            </td>
            <td>{{ $booking->listing_type === 'sale' ? 'Purchase' : 'Stay' }}</td>
            <td>
                @if($booking->check_in_date)
                    {{ $booking->check_in_date->format('d M Y') }}
                    @if($booking->check_out_date)
                        – {{ $booking->check_out_date->format('d M Y') }}
                    @endif
                @else
                    —
                @endif
            </td>
            <td>
                @if($booking->guests) {{ $booking->guests }} guests<br>@endif
                @if($booking->offer_price) Offer €{{ number_format((float) $booking->offer_price, 2) }}<br>@endif
                {{ $booking->message }}
            </td>
            <td>{{ $booking->status }}</td>
            <td>
                @if(in_array($booking->status, [\App\Enums\Status::PENDING, \App\Enums\Status::COMPLETED], true))
                    @if($booking->status === \App\Enums\Status::PENDING)
                        <form action="{{ route('owner.house-bookings.update', $booking) }}" method="post" style="display:inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="decision" value="accept">
                            <button class="btn btn-success btn-sm" type="submit">Accept</button>
                        </form>
                    @endif
                    <form action="{{ route('owner.house-bookings.update', $booking) }}" method="post" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="decision" value="cancel">
                        <button class="btn btn-warning btn-sm" type="submit">Cancel</button>
                    </form>
                @endif
            </td>
        </tr>
    @empty
        <tr><td colspan="6">No booking requests yet.</td></tr>
    @endforelse
    </tbody>
</table>
@if(method_exists($bookings, 'links'))
    {{ $bookings->links() }}
@endif

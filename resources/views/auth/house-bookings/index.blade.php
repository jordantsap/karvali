@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>House bookings</h1>
        </section>
        <section class="content">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>House</th>
                            <th>Company</th>
                            <th>Guest</th>
                            <th>Offer</th>
                            <th>Dates</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>
                                    <a href="{{ route('owner.houses.show', $booking->house) }}">{{ $booking->house->title }}</a>
                                </td>
                                <td>{{ $booking->company->title }}</td>
                                <td>
                                    {{ $booking->name }}<br>
                                    {{ $booking->email }}
                                </td>
                                <td>
                                    {{ $booking->listing_type === 'sale' ? 'Purchase' : 'Stay' }}
                                    @if($booking->offer_price)
                                        <br>€{{ number_format((float) $booking->offer_price, 2) }}
                                    @endif
                                </td>
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
                                <td>{{ $booking->status }}</td>
                                <td>
                                    @if($booking->status === \App\Enums\Status::PENDING)
                                        <form action="{{ route('owner.house-bookings.update', $booking) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="decision" value="accept">
                                            <button class="btn btn-success btn-sm" type="submit">Accept</button>
                                        </form>
                                    @endif
                                    @if(in_array($booking->status, [\App\Enums\Status::PENDING, \App\Enums\Status::COMPLETED], true))
                                        <form action="{{ route('owner.house-bookings.update', $booking) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="decision" value="cancel">
                                            <button class="btn btn-warning btn-sm" type="submit">Cancel</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7">No booking requests yet.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $bookings->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection

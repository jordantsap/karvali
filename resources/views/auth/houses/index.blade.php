@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Houses
                <small><a class="btn btn-primary" href="{{ route('owner.houses.create') }}">New house</a></small>
            </h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Offer</th>
                            <th>Price</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Bookings</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($houses as $house)
                            <tr>
                                <td>{{ $house->title }}</td>
                                <td>{{ $house->company->title }}</td>
                                <td>{{ $house->listing_type === 'sale' ? 'Sale' : 'Rent' }}</td>
                                <td>{{ $house->priceLabel() }}</td>
                                <td>{{ $house->city }}</td>
                                <td>{{ $house->active ? $house->status : 'draft' }}</td>
                                <td>{{ $house->bookings->count() }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('owner.houses.show', $house) }}">View</a>
                                    <a class="btn btn-default btn-sm" href="{{ route('owner.houses.edit', $house) }}">Edit</a>
                                    <form action="{{ route('owner.houses.destroy', $house) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this house?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">You have not listed a house yet.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $houses->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection

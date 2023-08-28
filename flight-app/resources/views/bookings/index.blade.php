@extends('layout')

@section('content')
    <div class="container m-1">

        <a href="{{ route('bookings.create') }}" class="btn btn-success mb-4">Create New Booking</a>


        <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Flight</th>
                <th>Seat</th>
                <th>Passenger</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_id }}</td>
                    <td>{{ $booking->flight->name }}</td>
                    <td>{{ $booking->seat }}</td>
                    <td>{{ $booking->passenger->name }}</td>
                    <td>{{ $booking->price }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->booking_id) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $bookings->links() }}
    </div>
@endsection

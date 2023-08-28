@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Bookings List</h2>

        <a href="{{ route('bookings.create') }}" class="btn btn-success mb-4">Create New Booking</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
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

                        <form action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $bookings->links() }} <!-- for pagination -->
    </div>
@endsection

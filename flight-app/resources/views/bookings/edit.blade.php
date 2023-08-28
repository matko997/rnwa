@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Edit Booking</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('bookings.update', $booking->booking_id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="flight_id">Flight</label>
                <select id="flight_id" name="flight_id" class="form-control">
                    @foreach($flights as $flight)
                        <option value="{{ $flight->id }}" {{ $flight->id == $booking->flight_id ? 'selected' : '' }}>
                            {{ $flight->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="seat">Seat</label>
                <input type="text" id="seat" name="seat" class="form-control" value="{{ $booking->seat }}" placeholder="Enter seat number">
            </div>

            <div class="form-group">
                <label for="passenger_id">Passenger</label>
                <select id="passenger_id" name="passenger_id" class="form-control">
                    @foreach($passengers as $passenger)
                        <option value="{{ $passenger->id }}" {{ $passenger->id == $booking->passenger_id ? 'selected' : '' }}>
                            {{ $passenger->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $booking->price }}" placeholder="Enter price">
            </div>

            <div class="form-group text-right mt-2">
                <input type="submit" value="Update Booking" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection

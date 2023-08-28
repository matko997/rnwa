@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Create New Booking</h2>

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

        <form method="post" action="{{ route('bookings.store') }}">
            @csrf

            <div class="form-group">
                <label for="flight_id">Flight</label>
                <select id="flight_id" name="flight_id" class="form-control">
                    <option value="" disabled selected>Select Flight</option>
                    @foreach($flights as $flight)
                        <option value="{{ $flight->id }}">{{ $flight->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="seat">Seat</label>
                <input type="text" id="seat" name="seat" class="form-control" placeholder="Enter seat number">
            </div>

            <div class="form-group">
                <label for="passenger_id">Passenger</label>
                <select id="passenger_id" name="passenger_id" class="form-control">
                    <option value="" disabled selected>Select Passenger</option>
                    @foreach($passengers as $passenger)
                        <option value="{{ $passenger->id }}">{{ $passenger->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Enter price">
            </div>

            <div class="form-group text-right mt-2">
                <input type="submit" value="Create Booking" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection

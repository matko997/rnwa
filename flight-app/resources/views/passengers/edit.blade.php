@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Edit Passenger</h2>
        <form method="post" action="{{route('passengers.update', $passenger->passenger_id)}}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="passportno">Passport Number:</label>
                <input type="text" id="passportno" name="passportno" value="{{ $passenger->passportno }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" value="{{ $passenger->firstname }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" value="{{ $passenger->lastname }}" class="form-control" required>
            </div>

            <div class="form-group text-right mt-2">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection

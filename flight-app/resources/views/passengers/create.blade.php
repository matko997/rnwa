@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Add Passenger</h2>
        <form method="post" action="{{route('passengers.store')}}">
            @csrf
            <!-- Passport No -->
            <div class="form-group">
                <label for="passportno">Passport No:</label>
                <input type="text" id="passportno" name="passportno" class="form-control" required>
            </div>
            <!-- Firstname -->
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" class="form-control" required>
            </div>
            <!-- Lastname -->
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" class="form-control" required>
            </div>
            <div class="text-right mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection

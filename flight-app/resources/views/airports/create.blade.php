@extends('layout')


@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Add Airport</h2>
        <form method="post" action="{{route('airports.store')}}">
            @csrf

            <div class="form-group">
                <label for="airlineName">Name:</label>
                <input type="text" id="name" name="name" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="iata">Iata code:</label>
                <input type="text" maxlength="3" id="iata" name="iata" class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label for="icao">Icao code:</label>
                <input type="text" maxlength="4" id="icao" name="icao" class="form-control"
                       required>
            </div>

            <div class="text-right mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection



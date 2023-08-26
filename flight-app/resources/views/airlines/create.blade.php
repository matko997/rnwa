@extends('layout')


@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Add Airline</h2>
        <form method="post" action="{{route('airlines.store')}}">
            @csrf

            <div class="form-group">
                <label for="airlineName">Name:</label>
                <input type="text" id="airlinename" name="airlinename" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="iata">Iata code:</label>
                <input type="text" maxlength="2" id="iata" name="iata" class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label for="base_airport">Base airport:</label>
                <select class="form-select" name="base_airport" id="base_airport" required>
                    <option value="">Pick the base airport</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->airport_id }}"> {{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection



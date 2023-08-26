@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Edit Airline</h2>
        <form method="post" action="{{route('airlines.update',$airline->airline_id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="airlineName">Name:</label>
                <input type="text" id="airlinename" name="airlinename" value="{{$airline['airlinename']}}" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="iata">Iata code:</label>
                <input type="text" maxlength="2" id="iata" name="iata" value="{{$airline['iata']}}" class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label for="base_airport">Base airport:</label>
                <select class="form-select" name="base_airport" id="base_airport" required>
                    <option value="">Pick the base airport</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->airport_id }}"
                            {{ $airport->airport_id === $airline->base_airport ? 'selected' : '' }}>
                            {{ $airport->name }}
                        </option>
                    @endforeach
                </select>
            </div>



            <div class="form-group text-right mt-2">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection

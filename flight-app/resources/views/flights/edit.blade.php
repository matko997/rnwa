@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Edit Flight</h2>
        <form method="post" action="{{route('flights.update',$flight->flight_id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="from">From:</label>
                <select class="form-select" name="from" id="from" required>
                    <option value="">From</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->airport_id }}"
                            {{ $airport->airport_id === $flight->from ? 'selected' : '' }}>
                            {{ $airport->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="to">To:</label>
                <select class="form-select" name="to" id="to" required>
                    <option value="">To</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->airport_id }}"
                            {{ $airport->airport_id === $flight->to ? 'selected' : '' }}>
                            {{ $airport->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="departure">Departure time</label>
            <input name="departure" class="form-control" value="{{$flight['departure']}}" type="datetime-local"/>
            <label for="arrival">Arrival time</label>
            <input name="arrival" class="form-control" value="{{$flight['arrival']}}" type="datetime-local"/>
            <div class="form-group">
                <label for="airline">Airline:</label>
                <select class="form-select" name="airline_id" id="airline_id" required>
                    <option value="">Pick the airline</option>
                    @foreach($airlines as $airline)
                        <option value="{{ $airline->airline_id }}"
                            {{ $airline->airline_id === $flight->airline_id ? 'selected' : '' }}>
                            {{ $airline->airlinename }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="airplane_id">Airplane type:</label>
                <select class="form-select" name="airplane_id" id="airplane_id" required>
                    <option value="">Pick the airplane type</option>
                    @foreach($airplanes as $airplane)
                        <option value="{{ $airplane->airplane_id }}"
                            {{ $airplane->airplane_id === $flight->airplane_id ? 'selected' : '' }}>
                            {{ $airplane->type->identifier }}
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

@extends('layout')


@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Add Flight</h2>
        <form method="post" action="{{route('flights.store')}}">
            @csrf

            <div class="form-group">
                <label for="from">From:</label>
                <select class="form-select" name="from" id="from" required>
                    <option value="">Pick the starting destination</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->airport_id }}"> {{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="to">From:</label>
                <select class="form-select" name="to" id="to" required>
                    <option value="">Pick the finish destination</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->airport_id }}"> {{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>
            <label for="departure">Departure time</label>
            <input name="departure" class="form-control" type="datetime-local"/>
            <label for="arrival">Arrival time</label>
            <input name="arrival" class="form-control" type="datetime-local"/>
            <div class="form-group">
                <label for="airline">Airline:</label>
                <select class="form-select" name="airline_id" id="airline_id" required>
                    <option value="">Pick the airline</option>
                    @foreach($airlines as $airline)
                        <option value="{{ $airline->airline_id }}"> {{ $airline->airlinename }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="airline">Airplane type:</label>
                <select class="form-select" name="airplane_id" id="airplane_id" required>
                    <option value="">Pick the airplane type</option>
                    @foreach($airplanes as $airplane)
                        <option value="{{ $airplane->type->type_id }}"> {{ $airplane->type->identifier }}</option>
                    @endforeach
                </select>
            </div>


            <div class="text-right mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection



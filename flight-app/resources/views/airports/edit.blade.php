@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Edit Airport</h2>
        <form method="post" action="{{route('airports.update',$airport->airport_id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="airlineName">Name:</label>
                <input type="text" id="name" name="name" value="{{$airport['name']}}" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="iata">Iata code:</label>
                <input type="text" maxlength="3" id="iata" name="iata" value="{{$airport['iata']}}" class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label for="icao">Icao code:</label>
                <input type="text" maxlength="4" id="icao" name="icao" value="{{$airport['icao']}}" class="form-control"
                       required>
            </div>


            <div class="form-group text-right mt-2">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection

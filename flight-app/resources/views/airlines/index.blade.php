@extends('layout')
@section('content')

    <div class="container m-1">
        <a class="btn btn-success" href="{{route('airlines.create')}}">Add Airline</a>

        <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Airline iata code</th>
                    <th>Airline</th>
                    <th>Base airport</th>
                    <th>Airport iata code</th>
                    <th>Airport icao code</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($airlines as $airline)
                    <tr>
                        <td>{{ $airline->iata }}</td>
                        <td>{{ $airline->airlinename }}</td>
                        <td>{{ $airline->airports->name }}</td>
                        <td>{{ $airline->airports->iata }}</td>
                        <td>{{ $airline->airports->icao }}</td>
                        <td>
                            <a href="{{ route('airlines.edit', $airline->airline_id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-airline-{{$airline->airline_id}}').submit()">
                                Delete
                            </button>
                            <form id="delete-airline-{{$airline->airline_id}}"
                                  action="{{route('airlines.destroy',$airline->airline_id)}}" method="POST"
                                  style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection

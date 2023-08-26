@extends('layout')
@section('content')

    <div class="container m-1">
        <a class="btn btn-success" href="{{route('flights.create')}}">Add Flight</a>

        <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Airline</th>
                    <th>Airplane type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->source->name }}</td>
                        <td>{{ $flight->destination->name }}</td>
                        <td>{{ $flight->departure }}</td>
                        <td>{{ $flight->arrival }}</td>
                        <td>{{ $flight->airline->airlinename }}</td>
                        <td>{{ $flight->airplane->type->identifier }}</td>
                        <td>
                            <a href="{{ route('flights.edit', $flight->flight_id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-flight-{{$flight->flight_id}}').submit()">
                                Delete
                            </button>
                            <form id="delete-flight-{{$flight->flight_id}}"
                                  action="{{route('flights.destroy',$flight->flight_id)}}" method="POST"
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

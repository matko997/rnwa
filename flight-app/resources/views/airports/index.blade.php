@extends('layout')
@section('content')

    <div class="container m-1">
        <a class="btn btn-success" href="{{route('airports.create')}}">Add Airport</a>

        <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Iata code</th>
                    <th>Icao code</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($airports as $airport)
                    <tr>
                        <td>{{ $airport['iata'] }}</td>
                        <td>{{ $airport['icao'] }}</td>
                        <td>{{ $airport['name'] }}</td>
                        <td>
                            <a href="{{ route('airports.edit', $airport->airport_id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-airport-{{$airport->airport_id}}').submit()">
                                Delete
                            </button>
                            <form id="delete-airport-{{$airport->airport_id}}"
                                  action="{{route('airports.destroy',$airport->airport_id)}}" method="POST"
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

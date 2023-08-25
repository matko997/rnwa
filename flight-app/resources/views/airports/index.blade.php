@extends('layout')
@section('content')
<a href="{{route('airports.create')}}" class="button create">Create Airport</a>

<table>
    <tr>
        <th>Airport ID</th>
        <th>Iata code</th>
        <th>Icao code</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($airports as $airport)
    <tr>
        <td>{{ $airport['airport_id'] }}</td>
        <td>{{ $airport['iata'] }}</td>
        <td>{{ $airport['icao'] }}</td>
        <td>{{ $airport['name'] }}</td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{route('airports.edit',$airport->airport_id)}}"
               role="button">Edit</a>
            <form method="post" action="{{route('airports.destroy',$airport->airport_id)}}" style="display:inline;">
                @csrf
                <input type="submit" name="delete" value="Delete" class="form-button delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection

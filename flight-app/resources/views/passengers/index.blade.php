@extends('layout')

@section('content')

    <div class="container m-1">
        <a class="btn btn-success" href="{{route('passengers.create')}}">Add Passenger</a>

        <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Passport No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($passengers as $passenger)
                    <tr>
                        <td>{{ $passenger->passportno }}</td>
                        <td>{{ $passenger->firstname }}</td>
                        <td>{{ $passenger->lastname }}</td>
                        <td>
                            <a href="{{ route('passengers.edit', $passenger->passenger_id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{route('passengers.destroy',$passenger->passenger_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

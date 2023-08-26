@extends('layout')
@section('content')

    <div class="container m-1">
        <a class="btn btn-success" href="{{route('airplanes.create')}}">Add Airplane</a>

        <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Capacity</th>
                    <th>Identifier</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($airplanes as $airplane)
                    <tr>
                        <td>{{ $airplane->capacity }}</td>
                        <td>{{ $airplane->type->identifier }}</td>
                        <td>{{ $airplane->type->description }}</td>
                        <td>
                            <a href="{{ route('airplanes.edit', $airplane->airplane_id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-airplane-{{$airplane->airplane_id}}').submit()">
                                Delete
                            </button>
                            <form id="delete-airplane-{{$airplane->airplane_id}}"
                                  action="{{route('airplanes.destroy',$airplane->airplane_id)}}" method="POST"
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

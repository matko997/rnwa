@extends('layout')

@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Edit Airplane</h2>
        <form method="post" action="{{route('airplanes.update',$airplane->airplane_id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" value="{{$airplane['capacity']}}"
                       class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-select" name="type_id" id="type_id" required>
                    <option value="">Pick the type</option>
                    @foreach($airplaneTypes as $type)
                        <option value="{{ $type->type_id }}"
                            {{ $type->type_id === $airplane->type_id ? 'selected' : '' }}>
                            {{ $type->identifier }}
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

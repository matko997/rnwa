@extends('layout')


@section('content')
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Add Airline</h2>
        <form method="post" action="{{route('airplanes.store')}}">
            @csrf

            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-select" name="type_id" id="type_id" required>
                    <option value="">Pick the type</option>
                    @foreach($airplaneTypes as $type)
                        <option value="{{ $type->type_id }}"> {{ $type->identifier }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection



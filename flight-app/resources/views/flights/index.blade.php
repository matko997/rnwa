@extends('layout')
@section('content')

    <div class="container m-1">
        <div class="d-flex justify-content-between mb-2">
            <a class="btn btn-success" href="{{route('flights.create')}}">Add Flight</a>
            <div id="app">
                <input type="text" id="search-box-input" placeholder="Search Flights...">
            </div>
        </div>
        <div id="search-results" class="mb-2">
            <!-- Search results will be populated here -->
        </div>


    <script>
        $(document).ready(function () {
            // Call this function when the page loads
            performAjaxRequest('');

            $('#search-box-input').on('input', function () {
                var query = $(this).val();
                performAjaxRequest(query);
            });
        });

        function performAjaxRequest(query) {
            $.ajax({
                url: '/search-flights',
                type: 'GET',
                data: {query: query},
                success: function (response) {
                    populateResults(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // handle errors
                }
            });
        }



        function populateResults(data) {
            let html = '<div class="table-responsive mt-2">';
            html += '<table class="table table-hover table-bordered table-striped">';
            html += '<thead class="thead-dark">';
            html += '<tr>';
            html += '<th>From</th>';
            html += '<th>To</th>';
            html += '<th>Departure</th>';
            html += '<th>Arrival</th>';
            html += '<th>Airline</th>';
            html += '<th>Airplane type</th>';
            html += '<th>Action</th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';
console.log(data);
            $.each(data, function(index, flight) {
                html += '<tr>';
                html += '<td>' + (flight.source ? flight.source.name : 'N/A') + '</td>';
                html += '<td>' + (flight.destination ? flight.destination.name : 'N/A') + '</td>';
                html += '<td>' + flight.departure + '</td>';
                html += '<td>' + flight.arrival + '</td>';
                html += '<td>' + (flight.airline ? flight.airline.airlinename : 'N/A') + '</td>';
                html += '<td>' + (flight.airplane && flight.airplane.type ? flight.airplane.type.identifier : 'N/A') + '</td>';
                html += '<td>';
                html += '<a href="/flights/edit/' + flight.flight_id + '" class="btn btn-sm btn-primary">Edit</a>';
                html += ' <button type="button" class="btn btn-sm btn-danger" onclick="deleteFlight('+ flight.flight_id +')">Delete</button>';
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';
            html += '</div>';

            $('#search-results').html(html);
        }

    </script>
@endsection

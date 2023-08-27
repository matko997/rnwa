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
            document.addEventListener('DOMContentLoaded', function() {
                // Call this function when the page loads
                performAjaxRequest('');

                document.getElementById('search-box-input').addEventListener('input', function() {
                    // And also when the input changes
                    var query = this.value;  // Get the value from the input box
                    performAjaxRequest(query);
                });
            });

            function performAjaxRequest(query) {
                axios.get('/search-flights', {
                    params: {
                        query: query
                    }
                })
                    .then(function(response) {
                        populateResults(response.data);
                    })
                    .catch(function(error) {
                        // handle errors
                        console.log(error);
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

                data.forEach(function(flight) {
                    html += '<tr>';
                    html += '<td>' + (flight.source ? flight.source.name : 'N/A') + '</td>';
                    html += '<td>' + (flight.destination ? flight.destination.name : 'N/A') + '</td>';
                    html += '<td>' + flight.departure + '</td>';
                    html += '<td>' + flight.arrival + '</td>';
                    html += '<td>' + (flight.airline ? flight.airline.airlinename : 'N/A') + '</td>';
                    html += '<td>' + (flight.airplane && flight.airplane.type ? flight.airplane.type.identifier : 'N/A') + '</td>';
                    html += '<td>';
                    html += '<a href="/flights/' + flight.flight_id + '/edit" class="btn btn-sm btn-primary">Edit</a>';
                    html += ' <button type="button" class="btn btn-sm btn-danger" onclick="deleteFlight('+ flight.flight_id +')">Delete</button>';
                    html += '</td>';
                    html += '</tr>';
                });

                html += '</tbody>';
                html += '</table>';
                html += '</div>';

                document.getElementById('search-results').innerHTML = html;
            }

            function deleteFlight(id) {
                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Delete request or any other action to delete the airline.
                fetch(`/flights/`+id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                })
                    .then(response => {
                        if (response.redirected) {
                            window.location.href = response.url;
                        } else {
                            console.error('Failed to delete flight');
                        }
                    })
                    .catch((error) => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }


        </script>
@endsection

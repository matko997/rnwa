@extends('layout')
@section('content')

    <div class="container m-1">
        <div class="d-flex justify-content-between mb-2">
            <a class="btn btn-success" href="{{route('airlines.create')}}">Add Airline</a>
            <div id="app">
                <input type="text" id="search-box-input" placeholder="Search Airlines...">
            </div>
        </div>
        <div id="search-results" class="mb-2">

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Call this function when the page loads
            performFetchRequest('');

            document.getElementById('search-box-input').addEventListener('input', function() {
                // And also when the input changes
                var query = this.value;  // Get the value from the input box
                performFetchRequest(query);
            });
        });

        function performFetchRequest(query) {
            fetch(`/search-airlines?query=${query}`)
                .then(response => response.json())
                .then(data => populateResults(data))
                .catch(error => {
                    // handle errors
                    console.log(error);
                });
        }

        function populateResults(data) {
            let html = '<div class="table-responsive mt-2">';
            html += '<table class="table table-hover table-bordered table-striped">';
            html += '<thead class="thead-dark">';
            html += '<tr>';
            html += '<th>Airline Name</th>';
            html += '<th>Base Airport</th>';
            html += '<th>Action</th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';
console.log(data);
            data.forEach(function(airline) {
                html += '<tr>';
                html += '<td>' + airline.airlinename + '</td>';
                html += '<td>' + (airline.airports ? airline.airports.name : 'N/A') + '</td>';
                html += '<td>';
                html += '<a href="/airlines/' + airline.airline_id + '/edit" class="btn btn-sm btn-primary">Edit</a> ';
                html += '<button type="button" class="btn btn-sm btn-danger" onclick="deleteAirline('+ airline.airline_id +')">Delete</button>';
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';
            html += '</div>';

            document.getElementById('search-results').innerHTML = html;
        }

        function deleteAirline(id) {
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Delete request or any other action to delete the airline.
            fetch(`/airlines/`+id, {
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
                        console.error('Failed to delete airline');
                    }
                })
                .catch((error) => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

    </script>
@endsection

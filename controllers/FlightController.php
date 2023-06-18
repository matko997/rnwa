<?php


namespace controllers;
require_once __DIR__ . '/../models/Flight.php';
require_once __DIR__ . '/../models/Airline.php';
require_once __DIR__ . '/../models/Airport.php';
require_once __DIR__ . '/../models/Airplane.php';

use flights\Airline;
use flights\Airplane;
use flights\Flight;
use flights\Airport;

class FlightController
{
    public function index()
    {
        // Retrieve all flights from the database
        $flights = Flight::getAll();
        foreach ($flights as $key => $flight) {
            $fromAirport = Airport::getById($flight['from']);
            $toAirport = Airport::getById($flight['to']);
            $flights[$key]['from'] = $fromAirport['iata'];
            $flights[$key]['to'] = $toAirport['iata'];

            $airline = Airline::getById($flight['airline_id']);
            $flights[$key]['airline'] = $airline['airlinename'];
        }


        // Load the view to display the flights
        require_once __DIR__ . '/../views/flight/index.php';
    }

    public function store()
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $airline_id = $_POST['airline_id'];
        $airplane_id = $_POST['airplane_id'];


        try {
            Flight::create($from, $to, $departure, $arrival, $airline_id, $airplane_id);

            // Redirect to the flights index page
            header('Location: /rnwa/flights');
            exit();
        } catch (Exception $e) {
            $errorMessage = "An error occurred while creating the flight: " . $e->getMessage();
            echo $errorMessage;
        }
        header('Location: /rnwa/flights');
    }


    public function create()
    {

        // Fetch the airlines data
        $airlines = Airline::getAll();
        $airports = Airport::getAll();
        $airplanes = Airplane::getAll();

        require_once __DIR__ . '/../views/flight/create.php';
    }

    public function edit($id)
    {
        // Fetch the flight data by the provided ID
        $flight = Flight::getById($id);

        if ($flight) {
            $airports = Airport::getAll();
            $airlines = Airline::getAll();
            require_once __DIR__ . '/../views/flight/edit.php';
        } else {
            // Flight not found, show a 404 page or an error message
            header("HTTP/1.0 404 Not Found");
            echo "Flight not found";
        }
    }

    public function update($id)
    {
        // Get the flight data from the request
        $from = $_POST['from'];
        $to = $_POST['to'];
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $airline_id = $_POST['airline_id'];

        // Find the flight by the provided ID
        $flight = Flight::getById($id);

        if ($flight) {
            Flight::update($id, $from, $to, $departure, $arrival, $airline_id);

            // Redirect to the flights index page
            header('Location: /rnwa/flights');
        } else {
            // Flight not found, show a 404 page or an error message
            header("HTTP/1.0 404 Not Found");
            echo "Flight not found";
        }
    }


    public function delete($id)
    {
        Flight::delete($id);

        // Redirect to the flights index page
        header('Location: /rnwa/flights');
    }
}


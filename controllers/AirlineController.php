<?php

namespace controllers;
require_once __DIR__ . '/../models/Airline.php';
require_once __DIR__ . '/../models/Airport.php';

use flights\Airline;
use flights\Airport;

class AirlineController
{
    public function index()
    {
        $airlines = Airline::getAll();

        // Fetch the base airport name for each airline
        foreach ($airlines as $key => $airline) {
            $baseAirport = Airport::getById($airline['base_airport']);
            $airlines[$key]['baseAirport'] = $baseAirport['name'];
        }

        require_once __DIR__ . '/../views/airline/index.php';
    }

    public function store()
    {
        $iata = $_POST['iata'];
        $airlineName = $_POST['airlineName'];

        try {
            Airline::create($iata, $airlineName);

            header('Location: /rnwa/airlines');
            exit();
        } catch (Exception $e) {
            $errorMessage = "An error occurred while creating the airline: " . $e->getMessage();
            echo $errorMessage;
        }
        header('Location: /rnwa/airlines');
    }


    public function create()
    {
        $airports = Airport::getAll();
        require_once __DIR__ . '/../views/airline/create.php';
    }

    public function edit($id)
    {
        $airline = Airline::getById($id);
        if ($airline) {
            $airports = Airport::getAll();
            require_once __DIR__ . '/../views/airline/edit.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Airline not found";
        }
    }

    public function update($id)
    {

        $iata = $_POST['iata'];
        $airlineName = $_POST['airlineName'];

        $airline = Airline::getById($id);

        if ($airline) {
            Airline::update($id, $iata, $airlineName);
            header('Location: /rnwa/airlines');
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Airline not found";
        }
    }


    public function delete($id)
    {
        Airline::delete($id);

        header('Location: /rnwa/airlines');
    }
}
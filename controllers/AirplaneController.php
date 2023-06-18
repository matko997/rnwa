<?php

namespace controllers;
require_once __DIR__ . '/../models/Airline.php';
require_once __DIR__ . '/../models/Airplane.php';

use flights\Airline;
use flights\Airplane;


class AirplaneController
{
    public function index()
    {
        $airplanes = Airplane::getAll();
        foreach ($airplanes as $key => $airplane) {
            $airline = Airline::getById($airplane['airline_id']);
            $airplanes[$key]['airline'] = $airline['airlinename'];
        }
        require_once __DIR__ . '/../views/airplane/index.php';
    }

    public function store()
    {
        $capacity = $_POST['capacity'];
        $airlineId = $_POST['airlineId'];
        var_dump($capacity, $airlineId);
        try {
            Airplane::create($capacity, $airlineId);
            header('Location: /rnwa/airplanes');
            exit();
        } catch (Exception $e) {
            $errorMessage = "An error occurred while creating the airplane: " . $e->getMessage();
            echo $errorMessage;
        }
        header('Location: /rnwa/airplanes');
    }


    public function create()
    {
        $airlines = Airline::getAll();
        require_once __DIR__ . '/../views/airplane/create.php';
    }

    public function edit($id)
    {
        $airplane = Airplane::getById($id);

        if ($airplane) {
            $airlines = Airline::getAll();
            require_once __DIR__ . '/../views/airplane/edit.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Airplane not found";
        }
    }

    public function update($id)
    {
        $capacity = $_POST['capacity'];
        $airlineId = $_POST['airlineId'];

        $airplane = Airplane::getById($id);

        if ($airplane) {
            Airplane::update($id, $capacity, $airlineId);

            header('Location: /rnwa/airplanes');
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Airplane not found";
        }
    }


    public function delete($id)
    {
        Airplane::delete($id);
        header('Location: /rnwa/airplanes');
    }
}
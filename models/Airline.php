<?php

namespace flights;
require_once __DIR__ . '/../Connection.php';
use Connection;
use PDO;

class Airline
{
    public static function getAll()
    {
        $db = Connection::getInstance();
        $query = "SELECT * FROM airline";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = Connection::getInstance();

        $query = "SELECT * FROM airline WHERE airline_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($iata, $airlineName)
    {
        $db = Connection::getInstance();

        $query = "INSERT INTO airline (`iata`, `airlinename`, `base_airport`)
                  VALUES (:iata, :airlineName, :baseAirport)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':iata', $iata);
        $stmt->bindValue(':airlineName', $airlineName);
        $stmt->bindValue(':baseAirport', 13600, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function update($id, $iata, $airlineName)
    {
        $db = Connection::getInstance();

        $query = "UPDATE airline
                  SET `iata` = :iata, `airlinename` = :airlineName
                  WHERE airline_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':iata', $iata);
        $stmt->bindValue(':airlineName', $airlineName);
        $stmt->execute();
    }

    public static function delete($id)
    {
        $db = Connection::getInstance();

        $query = "DELETE FROM airline WHERE airline_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}
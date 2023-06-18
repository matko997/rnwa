<?php

namespace flights;
require_once __DIR__ . '/../Connection.php';

use Connection;
use PDO;

class Flight
{
    public static function getAll()
    {
        $db = Connection::getInstance();
        $query = "SELECT * FROM flight";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = Connection::getInstance();

        $query = "SELECT * FROM flight WHERE flight_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($from, $to, $departure, $arrival, $airline_id, $airplaneId)
    {
        $db = Connection::getInstance();

        $query = "INSERT INTO flight (flightno, `from`, `to`, departure, arrival, airline_id, airplane_id)
                  VALUES (:flightno, :from, :to, :departure, :arrival, :airline_id, :airplane_id)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':flightno', 'FFF');
        $stmt->bindValue(':from', $from, PDO::PARAM_INT);
        $stmt->bindValue(':to', $to, PDO::PARAM_INT);
        $stmt->bindValue(':departure', $departure);
        $stmt->bindValue(':arrival', $arrival);
        $stmt->bindValue(':airline_id', $airline_id, PDO::PARAM_INT);
        $stmt->bindValue(':airplane_id', $airplaneId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function update($id, $from, $to, $departure, $arrival, $airline_id)
    {
        $db = Connection::getInstance();

        $query = "UPDATE flight
                  SET `from` = :from, `to` = :to,
                      departure = :departure, arrival = :arrival,
                      airline_id = :airline_id
                  WHERE flight_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':from', $from, PDO::PARAM_INT);
        $stmt->bindValue(':to', $to, PDO::PARAM_INT);
        $stmt->bindValue(':departure', $departure, PDO::PARAM_STR);
        $stmt->bindValue(':arrival', $arrival, PDO::PARAM_STR);
        $stmt->bindValue(':airline_id', $airline_id, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function delete($id)
    {
        $db = Connection::getInstance();

        $query = "DELETE FROM flight WHERE flight_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>

<?php

namespace flights;
require_once __DIR__ . '/../Connection.php';

use Connection;
use PDO;

class Airplane
{
    public static function getAll()
    {
        $db = Connection::getInstance();
        $query = "SELECT * FROM airplane";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = Connection::getInstance();
        $query = "SELECT * FROM airplane WHERE airplane_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($capacity, $airlineId)
    {
        $db = Connection::getInstance();
        $typeId = 343;
        $query = "INSERT INTO airplane (`capacity`, `type_id`, `airline_id`)
                  VALUES (:capacity, :typeId, :airlineId)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':capacity', $capacity);
        $stmt->bindValue(':typeId', $typeId, PDO::PARAM_INT);
        $stmt->bindValue(':airlineId', $airlineId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function update($id, $capacity, $airlineId)
    {
        $db = Connection::getInstance();

        $query = "UPDATE airplane
                  SET `capacity` = :capacity, `airline_id` = :airlineId
                  WHERE airplane_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':capacity', $capacity . PDO::PARAM_INT);
        $stmt->bindValue(':airlineId', $airlineId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function delete($id)
    {
        $db = Connection::getInstance();

        $query = "DELETE FROM airplane WHERE airplane_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}
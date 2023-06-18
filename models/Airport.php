<?php

namespace flights;
require_once __DIR__ . '/../Connection.php';
use Connection;
use PDO;

class Airport
{
    public static function getAll()
    {
        $db = Connection::getInstance();
        $query = "SELECT * FROM airport";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = Connection::getInstance();

        $query = "SELECT * FROM airport WHERE airport_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
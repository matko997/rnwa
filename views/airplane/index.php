<?php
require_once __DIR__ . '/../layout.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Flight Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* Add custom CSS styles for the layout */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        h2 {
            margin-bottom: 10px;
        }

        .button {
            background-color: #1f3393;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            margin-bottom: 10px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #555;
        }

        .form-button {
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            margin-bottom: 10px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .form-button.edit {
            background-color: #d59f14;
        }

        .form-button.delete {
            background-color: red;
        }

        .form-button:hover {
            background-color: #555;
        }

        .create {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<a href="/rnwa/airplanes/create" class="button create">Create Airplane</a>

<table>
    <tr>
        <th>Airplane ID</th>
        <th>Capacity</th>
        <th>Airline</th>
        <th>Action</th>
    </tr>
    <?php foreach ($airplanes as $airplane): ?>
        <tr>
            <td><?= $airplane['airplane_id'] ?></td>
            <td><?= $airplane['capacity'] ?></td>
            <td><?= $airplane['airline'] ?></td>
            <td>
                <a href="/rnwa/airplanes/<?= $airplane['airplane_id'] ?>/edit" class="form-button edit">Edit</a>
                <form method="post" action="/rnwa/airplanes/<?= $airplane['airplane_id'] ?>/delete"
                      style="display:inline;">
                    <input type="submit" name="delete" value="Delete" class="form-button delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

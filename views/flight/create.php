<?php require_once __DIR__ . '/../layout.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Flight - Flight Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* Add custom CSS styles for the layout */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        h2 {
            margin-top: 0;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="datetime-local"], input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #1f3393;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Flight</h2>
    <form method="post" action="/rnwa/flights/store">
        <label for="from">From:</label>
        <select id="from" name="from" required>
            <?php foreach ($airports as $airport): ?>
                <option value="<?= $airport['airport_id'] ?>"><?= $airport['iata'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="to">To:</label>
        <select id="to" name="to" required>
            <?php foreach ($airports as $airport): ?>
                <option value="<?= $airport['airport_id'] ?>"><?= $airport['iata'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="departure">Departure:</label>
        <input type="datetime-local" id="departure" name="departure" required>

        <label for="arrival">Arrival:</label>
        <input type="datetime-local" id="arrival" name="arrival" required>

        <label for="airline_id">Airline:</label>
        <select id="airline_id" name="airline_id" required>
            <?php foreach ($airlines as $airline): ?>
                <option value="<?= $airline['airline_id'] ?>"><?= $airline['airlinename'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="airline_id">Airplane:</label>
        <select id="airplane_id" name="airplane_id" required>
            <?php foreach ($airplanes as $airplane): ?>
                <option value="<?= $airplane['airplane_id'] ?>"><?= $airplane['airplane_id'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="create" value="Create">
    </form>
</div>
</body>
</html>

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
    <h2>Create Airline</h2>
    <form method="post" action="/rnwa/airlines/store">
        <label for="iata">Iata code:</label>
        <input type="text" maxlength="3" id="iata" name="iata" required>

        <label for="airlineName">Name:</label>
        <input type="text" id="airlineName" name="airlineName" required>

        <label for="baseAirport">Base airport:</label>
        <select id="baseAirport" name="baseAirport" required>
            <?php foreach ($airports as $airport): ?>
                <option value="<?= $airport['airport_id'] ?>"><?= $airport['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="create" value="Create">
    </form>
</div>
</body>
</html>

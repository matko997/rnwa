<!DOCTYPE html>
<html>
<head>
    <title>Flight Management System</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <!-- Add this to the <head> section of your layout -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <!-- ... Other CSS files ... -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Add this at the end of the <body> section, before other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ... Other scripts ... -->

    <style>
        /* Add custom CSS styles for the layout */
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        main {
            padding: 20px;
            background-color: #fff;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/flights">Flights</a></li>
            <li><a href="/airlines">Airlines</a></li>
            <li><a href="/airplanes">Airplanes</a></li>
            <li><a href="/airports">Airports</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1>Welcome to the Flight Management System</h1>
</main>
@yield('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif
</body>
</html>

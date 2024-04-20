<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* Custom styles here */
        body {
            font-family: 'figtree', sans-serif;
            background-color: #000;
            color: #fff;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(70vh - 80px); /* Subtract header height */
            gap: 20px; /* Vertical gap between buttons */
        }
        h1 {
            font-family: 'Brush Script MT', cursive;
            font-size: 10em; /* Adjust font size as needed */
            margin-top: 20px; /* Move header text up */
        }
        .btn {
            width: 400px; /* Set button width */
            font-family: 'Brush Script MT', cursive;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Header -->
    <header>
        <div class="text-center mt-4">
            <h1>be Journal</h1>
        </div>
    </header>

    <!-- Body -->
    <div class="container text-center"> <!-- Changed here -->
        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom text-center mb-4">
        <p>2024.be Journal &copy; Danno.Miura.Okamoto </p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
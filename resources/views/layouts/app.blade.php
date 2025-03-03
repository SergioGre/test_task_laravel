<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Название вашего приложения')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{url('/')}}" target="_blank"><button>ДОМОЙ</button></a>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
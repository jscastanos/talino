<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Talino - Your Daily Source Of Science News</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>

<body>
    <header class="container-fluid" style="height: 50px; background-color: red">
        header
    </header>

    @yield('content')

    <footer class="container-fluid pt-3">
        <h5>Talino @ {{ now()->year }}</h5>
    </footer>
</body>

</html>

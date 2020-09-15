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
    <header class="container-fluid">
        header
    </header>

    @yield('content')

    <footer>
        <div class="container p-4 pt-5">
            <div class="row">
                <div class="col-md-3">
                    <h2>Talino </h2>
                    <p>
                        Your daily source of science &amp; technology
                        news, happenings, discoveries and many more.
                    </p>
                </div>
                <div class="col-md-9">
                    x
                </div>

                <div class="col-md-12">
                    <p class="text-center">
                        Developed by <a href="https://github.com/jscastanos" target="_blank">Zeck</a>
                    </p>
                    <p class="text-center">
                        Source code @ <a href="https://github.com/jscastanos/talino">GitHub</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>

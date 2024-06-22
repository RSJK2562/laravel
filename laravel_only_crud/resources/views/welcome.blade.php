<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        header {
            width: 100%;
            text-align: center;
            padding: 5px;
            background-color: lavender;
        }

        footer {
            width: 100%;
            text-align: center;
            padding: 5px;
            background-color: lavender;
            clear: both;
        }

        section {
            width: 20%;
            text-align: center;
            height: 400px;
            background-color: gainsboro;
            float: left;
        }

        main {
            width: 80%;
            height: 400px;
            background-color: lemonchiffon;
            float: left;
        }
    </style>
</head>

<body>
    <header>
        <h1>Top Bar</h1>
    </header>

    <section>
        @include('sidebar')
    </section>

    <main>
        @yield('main')
    </main>

    <footer>
        <h1>Footer</h1>
    </footer>
</body>

</html>
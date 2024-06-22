<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>

<body>
    @php
    $var = "Ravi";
    @endphp

    <h1>Welcome {{ $var }}</h1>

    <hr>
    
    <h3>Name: {{ $name }}</h3>
    <h3>Phono: {{ $phone }}</h3>
    <h3>City: {{ $city }}</h3>
</body>

</html>
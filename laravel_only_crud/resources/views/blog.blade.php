<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    @foreach ($users as $user)
    <h3>Name: <i>{{ $user['name'] }}</i></h3>
    <h3>Phono: <i>{{ $user['phone'] }}</i></h3>
    @endforeach
</body>

</html>
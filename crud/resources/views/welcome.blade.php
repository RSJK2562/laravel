<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="processform" method="post">
        @csrf
        <input type="text" name="t1" placeholder="Enter a Name">
        <input type="email" name="t2" placeholder="Enter a Email">
        <input type="submit" value="Click Me">
    </form>
    <br>
    <hr>
    <br>
    <form action="getformdata" method="post">
        @csrf
        <input type="text" name="t1" placeholder="Enter a Name">
        <input type="email" name="t2" placeholder="Enter a Email">
        <input type="submit" value="Click Me">
    </form>

</body>

</html>
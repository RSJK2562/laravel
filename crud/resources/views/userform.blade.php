<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>

<body>
    <center>
        <h2>User Registrantion</h2>
        <form action="processuserform" method="post">
            @csrf
            <input type="text" name="name" placeholder="Enter Your Name">
            <br>
            <br>
            <input type="email" name="email" placeholder="Enter Your Email">
            <br>
            <br>
            <input type="submit" value="Save Data">
        </form>
        @if (Session('msg'))
            {{ Session('msg') }}
        @endif

        @if (isset($res))
            <table border="1">
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @php
                    $sr = 1; // Initialize serial number outside the loop
                @endphp
                @foreach ($res as $item)
                    <tr>
                        <td>{{ $sr }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                    @php
                        $sr++; // Increment serial number inside the loop
                    @endphp
                @endforeach
            </table>
        @endif  
    </center>
</body>

</html>

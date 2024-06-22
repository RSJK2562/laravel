<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Data</title>
</head>

<body>
    @php
        // if (session('uid')) {
            // $userexist = session('uid');
            // echo $userexist->name;
            echo '<a href="processlogout">Logout</a> | ';
            echo '<a href="user">Add User</a> | ';
        // }
    @endphp
    <center>
        <h1>Check Your Result</h1>
        <form action="processSearch" method="POST">
            @csrf
            <input type="numbre" name="rollnum" placeholder="Enter Roll Numbre">
            <button>Search</button>
        </form>
        <br>
        @if (Session('errorMsg'))
            <p style="color: red">{{ Session('errorMsg') }}</p>
        @endif
        @if (isset($res))
            <table border="1" callpadding="5">
                <tr>
                    <td colspan="2">Roll No</td>
                    <td colspan="2">{{ $res->rollnumbre }}</td>
                </tr>
                <tr>
                    <td colspan="2">Name</td>
                    <td colspan="2">{{ $res->name }}</td>
                </tr>
                <tr>
                    <td colspan="2">Class</td>
                    <td colspan="2">{{ $res->class }}</td>
                </tr>
                <tr style="background-color: bisque; color:black;">
                    <th>HTML</th>
                    <th>C S S</th>
                    <th>JavaScript</th>
                    <th>Total</th>
                </tr>
                <tr style="font-weight: bold; text-align: center;">
                    <td>
                        @if ($res->sub1 >= 50)
                            <span style="color: green">{{ $res->sub1 }}</span>
                        @else
                            <span style="color: red">{{ $res->sub1 }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($res->sub2 >= 50)
                            <span style="color: green">{{ $res->sub2 }}</span>
                        @else
                            <span style="color: red">{{ $res->sub2 }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($res->sub3 >= 50)
                            <span style="color: green">{{ $res->sub3 }}</span>
                        @else
                            <span style="color: red">{{ $res->sub3 }}</span>
                        @endif
                    </td>
                    <td style="background-color: bisque; color:black;">
                        {{ $res->sub1 + $res->sub2 + $res->sub3 }}
                    </td>
                </tr>
            </table>
            <table>

            </table>
        @endif
    </center>
</body>

</html>

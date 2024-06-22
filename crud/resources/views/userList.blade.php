<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User List</title>
</head>

<body>
    <dev class="container">
        <h5 class="text-center">
            <a href="{{ url('AddUser') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i></a>
        </h5>
        <h4 class="text-center mb-3">All User's List</h4>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Password</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sr = 1;
                            @endphp
                            @foreach ($data as $res)
                                <tr>
                                    <th scope="row">{{ $sr }}</th>
                                    <td>{{ $res->name }}</td>
                                    <td>{{ $res->email }}</td>
                                    <td>{{ $res->mobile }}</td>
                                    <td>{{ $res->password }}</td>
                                    <td>
                                        <a href="UserEdit/{{ $res->id }}" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('DeleteUser/' . $res->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                                    $sr++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </dev>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    @if ($message = session('delete'))
        <script>
            $.notify("{{ $message }}", "success");
        </script>
    @endif
    @if ($message = session('update'))
        <script>
            $.notify("{{ $message }}", "success");
        </script>
    @endif
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Employee Registration Form</title>
</head>

<body>
    <dev class="container">
        <h3 class="text-center">Employee Registration Form</h3>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                {{-- <form action="{{ url('addEmployee') }}" method="POST"> --}}
                <form action="/addEmployee" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Mobile</label>
                        <input type="number"name="mobile" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput4">
                    </div>
                    <button class="btn btn-success w-100">Submit</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        @if ($data = session('data'))


            <h4 class="text-center mt-5 mb-3">All Employee Data</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Password</th>
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
                                    </tr>
                                    @php
                                        $sr++;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </dev>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    @if ($message = session('success'))
        <script>
            $.notify("{{ $message }}", "success");
        </script>
    @endif
</body>

</html>

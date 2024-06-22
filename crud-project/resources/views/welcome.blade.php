<!DOCTYPE html>
<html lang="en">

<head>
    @include('headLink')
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">Welcome, Coder!</h2>
        <div class="row my-3 justify-content-md-center">
            <div class="col-6 text-center">
                <a href="{{ '/Add' }}" class="btn btn-danger fw-bold"> <i class="fa-solid fa-user-plus"></i>
                    Registration</a>
            </div>
            <div class="col-6 text-center">
                <a href="{{ url('/Login') }}" class="btn btn-success fw-bold"><i
                        class="fa-solid fa-right-to-bracket"></i> Login</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Technology</th>
                                <th>Address</th>
                                <th>Password</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sr = 1;
                            @endphp
                            @foreach ($records as $item)
                                <tr>
                                    <td>{{ $sr }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->dob }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->tech }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->password }}</td>
                                    <td>
                                        <img src="{{ asset('photo/' . $item->photos) }}" alt="photo" height="50" width="100">
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
        </div>
    </div>

    {{-- js --}}
    @include('jsLink')
</body>

</html>

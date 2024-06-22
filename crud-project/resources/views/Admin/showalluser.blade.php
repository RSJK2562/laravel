<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/headLink')
</head>

<body>
    <div class="container">
        @include('Admin/navbar')
        <h2 class="text-center mt-4">All User Data</h2>
        <div class="row justify-content-md-center my-5 py-5">
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
                                <th colspan="2">Action</th>
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
                                        <img src="{{ asset('photo/' . $item->photos) }}" alt="photo" height="50"
                                            width="100">
                                    </td>
                                    <td>
                                        <a href="{{ 'EditProfile/' . $item->id }}" class="btn btn-secondary btn-sm"><i
                                                class="fa-solid fa-user-pen"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ 'DeleteProfile/' . $item->id }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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

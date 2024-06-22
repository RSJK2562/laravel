<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/headLink')
</head>

<body>
    <div class="container">
        @include('Admin/navbar')
        <div class="row my-3 justify-content-md-center">
            <div class="col-lg-6">
                <div class="card">
                    <img src="{{ asset('photo/' . $item->photos) }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h2 class="card-title text-uppercase fw-bold">{{ $item->name }}</h2>
                        <div class="card-text">
                            <table class="table table-bordered">
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">DOB</th>
                                    <td>{{ $item->dob }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">City</th>
                                    <td>{{ $item->city }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Technology</th>
                                    <td>{{ $item->tech }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $item->address }}</td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ 'EditProfile/' . $item->id }}" class="btn btn-primary btn-sm"><i
                                class="fa-solid fa-user-pen"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- js --}}
    @include('jsLink')
</body>

</html>

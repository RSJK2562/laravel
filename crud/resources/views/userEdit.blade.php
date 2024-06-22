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
    <title>User Edit</title>
</head>

<body>
    <dev class="container">
        <h4 class="text-center">Update Profile</h4>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="{{ url('updateUser') }}" method="POST">
                    @csrf
                    <input type="hidden" name="userId" value="{{$user->id}}">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Mobile</label>
                        <input type="number"name="mobile" class="form-control" id="exampleFormControlInput3" value="{{$user->mobile}}">
                    </div>
                    <button class="btn btn-success w-100">Update</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </dev>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admission Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <dev class="container">
        <h1 class="text-center">Student Admission Form</h1>
        <form action="pro_admission" method="POST" enctype="multipart/form-data">
            <div class="row mx-5">
                <div class="col-sm-6">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMobile" class="form-label">Mobile</label>
                        <input type="number" class="form-control" id="exampleInputMobile" name="mobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMobile" class="form-label">DOB</label>
                        <input type="date" class="form-control" id="exampleInputMobile" name="dob" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Address</label>
                        <textarea cols="30" rows="8" class="form-control" id="exampleInputName" name="address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="exampleInputName" name="photo" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Signature</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="signature" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block">Submit Now</button>
            </div>
        </form>
    </dev>
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

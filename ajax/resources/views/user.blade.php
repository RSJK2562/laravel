<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>AJAX | Registration Form</title>
    <style>
        body {
            background-color: rgb(222, 235, 235)
        }
    </style>
</head>

<body>
    <dev class="container">
        <h3 class="text-center">AJAX Serialize Data & Deserialize In Controller</h3>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form id="submitForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="number"name="mobile" class="form-control" id="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Submit</button>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#submitForm").on("submit", function(e) {
                e.preventDefault();

                var data = $("#submitForm").serialize();
                
                $.ajax({
                    url: "{{ url('/addUser1') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: data,
                    },
                    deforeSend: function() {
                        $('.btn-success').html('Please Wait...!');
                    },
                    success: function(response) {
                        $("#submitForm").trigger("reset");
                        if (response.success) {
                            $.notify(response.message, "success");
                        }
                    },
                    complete: function() {
                        $('.btn-success').html('Submit');
                    },
                    error: function(response) {
                        if (response.success) {
                            $.notify(response.message, "error");
                        }
                    }
                })
            });
        });
    </script>
</body>

</html>

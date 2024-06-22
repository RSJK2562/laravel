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
        <h3 class="text-center">AJAX Database Insertion with Bootstrap Modal</h3>
        <div class="row">
            <div class="col-sm-12 text-center">
                <!-- Button trigger modal -->
                <button type="button" id="modalbtn" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#myModal">
                    Add User Data
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> <span class="title">Add</span> User
                                    Record</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="submitForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <div class="mb-3 text-start">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="number"name="mobile" class="form-control" id="mobile">
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <button type="submit" class="btn btn-success w-100">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-success table-striped">
                    <thead class="text-center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody id="data">

                    </tbody>
                </table>
            </div>
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
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#submitForm").on("submit", function(e) {
                e.preventDefault();

                var data = $("#submitForm").serialize();
                // alert(data);
                // return;
                $.ajax({
                    url: "{{ url('/addUser2') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: data,
                    },
                    success: function(response) {
                        // $("#submitForm").trigger("reset");
                        $('#submitForm')[0].reset();
                        $('#myModal').modal('hide');

                        if (response.success) {
                            $.notify(response.message, "success");
                        }

                        fetchRecods();
                    },
                    error: function(response) {
                        if (response.success) {
                            $.notify(response.message, "error");
                        }
                    }
                })
            });

            // fetch data statr
            function fetchRecods() {
                $.ajax({
                    url: "{{ url('/getdata') }}",
                    type: 'GET',
                    // success: function(response) {
                    //     // console.log(response);
                    //     var tr = '';
                    //     var sr = 1;
                    //     for (var i = 0; i < response.length; i++) {
                    //         var id = response[i].id;
                    //         var name = response[i].name;
                    //         var email = response[i].email;
                    //         var mobile = response[i].mobile;
                    //         var password = response[i].password;

                    //         tr += '<tr>';
                    //         tr += '<td>' + sr++ + '</td>';
                    //         tr += '<td>' + name + '</td>';
                    //         tr += '<td>' + email + '</td>';
                    //         tr += '<td>' + mobile + '</td>';
                    //         tr += '<td>' + password + '</td>';

                    //         tr += '<td><button type="button" class="btn btn-sm fw-bold btn-warning" value="'+id+'">Edit</button></td>';
                    //         tr += '<td><button type="button" class="btn btn-sm fw-bold btn-danger" value="'+id+'">Delete</button></td>';
                    //         tr += '</tr>';
                    //     }
                    //     $("#data").html(tr);
                    // }

                    // success: function(response) {
                    //     var tableRows = '';
                    //     var sr = 1;

                    //     response.forEach(function(user) {
                    //         tableRows += `
                //         <tr>
                //             <td>${sr++}</td>
                //             <td>${user.name}</td>
                //             <td>${user.email}</td>
                //             <td>${user.mobile}</td>
                //             <td>${user.password}</td>
                //             <td>
                //                 <button type="button" class="btn btn-sm fw-bold btn-warning" value="${user.id}">Edit</button>
                //             </td>
                //             <td>
                //                 <button type="button" class="btn btn-sm fw-bold btn-danger" value="${user.id}">Delete</button>
                //             </td>
                //         </tr>
                //     `;
                    //     });

                    //     $("#data").html(tableRows);
                    // }

                    // success: function(response) {
                    //     var tableRows = response.map(function(user, index) {
                    //         return '<tr>' +
                    //             '<td>' + (index + 1) + '</td>' +
                    //             '<td>' + user.name + '</td>' +
                    //             '<td>' + user.email + '</td>' +
                    //             '<td>' + user.mobile + '</td>' +
                    //             '<td>' + user.password + '</td>' +
                    //             '<td><button type="button" class="btn btn-sm fw-bold btn-warning" value="' +
                    //             user.id + '">Edit</button></td>' +
                    //             '<td><button type="button" class="btn btn-sm fw-bold btn-danger" value="' +
                    //             user.id + '">Delete</button></td>' +
                    //             '</tr>';
                    //     });

                    //     $("#data").html(tableRows.join(''));
                    // }
                    success: function(response) {
                        var tableRows = ''; // Initialize an empty string to store table rows
                        response.forEach(function(user, index) {
                            // Destructure user object
                            var {
                                id,
                                name,
                                email,
                                mobile,
                                password
                            } = user;

                            // Construct table row
                            tableRows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${name}</td>
                                <td>${email}</td>
                                <td>${mobile}</td>
                                <td>${password}</td>
                                <td>
                                    <button type="button" class="btn btn-sm fw-bold btn-warning edit-btn" value="${id}">Edit</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm fw-bold btn-danger delete-btn" value="${id}">Delete</button>
                                </td>
                            </tr>`;
                        });

                        // Update the table body with constructed rows
                        $("#data").html(tableRows);
                    }

                });
            }
            fetchRecods();
            // fetch data end 

            $('#modalbtn').on('click', function() {
                $('#submitForm')[0].reset();
                $('#id').val('');
            });

            // edit data start
            $(document).on('click', '.edit-btn', function(e) {
                e.preventDefault();
                var id = $(this).val();
                // alert(id);
                $.ajax({
                    url: "{{ url('/editdata') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        // alert(response.name);
                        $('#submitForm')[0].reset();
                        $('#id').val(response.id);
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        $('#mobile').val(response.mobile);
                        $('#password').val(response.password);
                        $('.btn-success').text('Update');
                        $('#myModal').modal('show');
                    },
                });
            });
            // edit data end


            // delete data start
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).val();

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, You will not be able to recover this Record With Laravel & Ajax file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // alert(id);
                            $.ajax({
                                url: "{{ url('/deleteData') }}",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    id: id
                                },
                                success: function(response) {
                                    if (response.success) {
                                        swal(response.message, {
                                            icon: "success",
                                        });
                                        fetchRecods();
                                    } else {
                                        swal("Error", {
                                            icon: "error",
                                        });
                                    }
                                },
                            });
                        } else {
                            swal("Your Record With Larave & Ajax file is safe!");
                        }
                    });
                    // var id = $(this).val();
                    // // alert(id);
                    // $.ajax({
                    //     url: "{{ url('/deleteData') }}",
                    //     type: "POST",
                    //     data: {
                    //         "_token": "{{ csrf_token() }}",
                    //         id: id
                    //     },
                    //     success: function(response) {
                    //         if (response.success) {
                    //             $.notify(response.message, "success");
                    //         }
                    //         fetchRecods();
                    //     },
                    // });
            });
            // delete data end
        });
    </script>
</body>

</html>

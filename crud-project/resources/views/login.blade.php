<!DOCTYPE html>
<html lang="en">

<head>
    @include('headLink')
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">Welcome, To Login!</h2>
        <div class="row my-3 justify-content-md-center">
            <div class="col-6 text-center">
                <a href="{{ '/' }}" class="btn btn-danger fw-bold"> <i class="fa-solid fa-house"></i>
                    Home
                </a>
            </div>
            <div class="col-6 text-center">
                <a href="{{ '/Login' }}" class="btn btn-success fw-bold"><i
                        class="fa-solid fa-right-to-bracket"></i> Login</a>
            </div>
        </div>
        <hr>
        <form action="{{ url('userLogin') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="psd" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-primary w-50 fw-bold"> <i class="fa-solid fa-share-from-square"></i> Login
                        Now </button>
                </div>
                <div class="col-lg-12 text-center mt-3">
                    <a href="{{ '/Forget' }}" class="fw-bold text-decoration-none">Fonget Password</a>
                </div>
            </div>
        </form>
    </div>

    {{-- js --}}
    @include('jsLink')
</body>

</html>

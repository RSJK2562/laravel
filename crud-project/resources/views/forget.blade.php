<!DOCTYPE html>
<html lang="en">

<head>
    @include('headLink')
</head>

<body>
    <div class="container">
        @if (Session('info') == '')
            <h2 class="text-center mt-3">Forget Password</h2>
        @else
            <h2 class="text-center mt-3">Mack Password</h2>
        @endif
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
        @if (Session('info') == '')
            <form action="{{ url('/ForgetPassword') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary w-50 fw-bold"> <i class="fa-solid fa-share-from-square"></i> Send
                            OTP </button>
                    </div>
                </div>
            </form>
        @else
            <form action="{{ url('/newpassword') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput" class="form-label">OTP</label>
                            <input type="text" name="otp" class="form-control" id="exampleFormControlInput"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">New Password</label>
                            <input type="password" name="npwd" class="form-control" id="exampleFormControlInput1"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Confirm Password</label>
                            <input type="password" name="cpwd" class="form-control" id="exampleFormControlInput2"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary w-50 fw-bold"> <i class="fa-solid fa-share-from-square"></i>
                            Submit </button>
                    </div>
                </div>
            </form>
        @endif

    </div>

    {{-- js --}}
    @include('jsLink')
</body>

</html>

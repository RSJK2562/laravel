<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/headLink')
</head>

<body>
    <div class="container">
        @include('Admin/navbar')
        <h4 class="text-center mt-5 fw-bold">Change Password</h4>
        <div class="row my-5 py-5 justify-content-md-center">
            <form action="{{ '/changePsd' }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput0" class="form-label">Old Password</label>
                            <input type="password" name="oldpsd" class="form-control" id="exampleFormControlInput0"
                                placeholder="Enter Old Password">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">New Password</label>
                            <input type="password" name="newpsd" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter New Passwrd">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Confirm Password</label>
                            <input type="password" name="conpsd" class="form-control" id="exampleFormControlInput3"
                                placeholder="Enter Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6 text-center">
                        <button class="btn btn-primary w-100 fw-bold"> <i class="fa-solid fa-key"></i> Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- js --}}
    @include('jsLink')
</body>

</html>

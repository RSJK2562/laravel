<!DOCTYPE html>
<html lang="en">

<head>
    @include('headLink')
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">Welcome, To Registration!</h2>
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
        <form action="{{ url('addUser') }}" method="post" enctype="multipart/form-data" id="validateForm">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput0" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput0"
                            placeholder="Enter full name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@gmal.com">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">DOB</label>
                        <input type="date" name="dob" class="form-control" id="exampleFormControlInput3"
                            placeholder="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="example" class="form-label">City</label>
                        <select name="city" class="form-select" aria-label="Default select example">
                            <option></option>
                            <option value="Lucknow">Lucknow</option>
                            <option value="Varanashi">Varanashi</option>
                            <option value="Jaunpur">Jaunpur</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="example" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Male"
                            id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="example" class="form-label">Technology</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technology[]" value="PHP"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            PHP
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technology[]" value="JAVA"
                            id="flexCheckDefault1">
                        <label class="form-check-label" for="flexCheckDefault1">
                            JAVA
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technology[]" value="MERN"
                            id="flexCheckDefault2">
                        <label class="form-check-label" for="flexCheckDefault2">
                            MERN
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technology[]" value="Python"
                            id="flexCheckDefault3">
                        <label class="form-check-label" for="flexCheckDefault3">
                            Python
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Full Address</label>
                        <textarea name="fulladdress" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="file" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="file">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="psd" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                                <input type="password" name="cpsd" class="form-control"
                                    id="exampleInputPassword2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary w-50 fw-bold"> <i
                            class="fa-solid fa-cloud-arrow-up"></i> Register Now </button>
                </div>
            </div>
        </form>
    </div>

    {{-- js --}}
    @include('jsLink')
</body>

</html>

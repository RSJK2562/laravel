<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/headLink')
</head>

<body>
    <div class="container">
        @include('Admin/navbar')
        <h4 class="text-center my-3 fw-bold">Update Profile</h4>
        <div class="row my-3 justify-content-md-center">
            <form action="{{ url('updateUser') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput0" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput0"
                                placeholder="Enter full name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@gmal.com" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">DOB</label>
                            <input type="date" name="dob" class="form-control" id="exampleFormControlInput3"
                                value="{{ $user->dob }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example" class="form-label">City</label>
                            <select name="city" class="form-select" aria-label="Default select example">
                                <option selected>-- Select --</option>
                                <option value="Lucknow" @if ($user->city == 'Lucknow') {{ 'selected' }} @endif>
                                    Lucknow</option>
                                <option value="Varanashi" @if ($user->city == 'Varanashi') {{ 'selected' }} @endif>
                                    Varanashi</option>
                                <option value="Jaunpur" @if ($user->city == 'Jaunpur') {{ 'selected' }} @endif>
                                    Jaunpur</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="example" class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Male"
                                id="flexRadioDefault1" @if ($user->gender == 'Male') {{ 'checked' }} @endif>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Female"
                                id="flexRadioDefault2" @if ($user->gender == 'Female') {{ 'checked' }} @endif>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                    </div>
                    @php
                        $tech = explode(',', $user->tech);
                    @endphp
                    <div class="col-lg-6">
                        <label for="example" class="form-label">Technology</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="technology[]" value="PHP"
                                id="flexCheckDefault"
                                @foreach ($tech as $item)
                                    @if ($item == 'PHP')
                                        {{ 'checked' }}
                                    @endif @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                PHP
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="technology[]" value="JAVA"
                                id="flexCheckDefault1"
                                @foreach ($tech as $item)
                                @if ($item == 'JAVA')
                                    {{ 'checked' }}
                                @endif @endforeach>
                            <label class="form-check-label" for="flexCheckDefault1">
                                JAVA
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="technology[]" value="MERN"
                                id="flexCheckDefault2"
                                @foreach ($tech as $item)
                                @if ($item == 'MERN')
                                    {{ 'checked' }}
                                @endif @endforeach>
                            <label class="form-check-label" for="flexCheckDefault2">
                                MERN
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="technology[]" value="Python"
                                id="flexCheckDefault3"
                                @foreach ($tech as $item)
                                @if ($item == 'Python')
                                    {{ 'checked' }}
                                @endif @endforeach>
                            <label class="form-check-label" for="flexCheckDefault3">
                                Python
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <img src="{{ asset('photo/' . $user->photos) }}" alt="photo" height="50"
                                width="75">
                            <br>
                            <label for="file" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="file" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Full Address</label>
                            <textarea name="fulladdress" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $user->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center mb-5">
                        <button type="submit" class="btn btn-primary w-50 fw-bold"> <i
                                class="fa-solid fa-cloud-arrow-up"></i> Update Now </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- js --}}
    @include('jsLink')
</body>

</html>

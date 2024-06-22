<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/headLink')
</head>

<body>
    <div class="container">
        @include('Admin/navbar')
        <h2 class="text-center mt-4">Purchasing Courses</h2>
        <form action="{{ '/paycourses' }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput0" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput0"
                            placeholder="Enter full name" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Select Technology</label>
                        <select name="tech" class="form-select" aria-label="Select Technology" required>
                            <option selected>Select</option>
                            <option value="PHP">PHP</option>
                            <option value="MERN">MERN</option>
                            <option value="Python">Python</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control" id="exampleFormControlInput3"
                            placeholder="0.0" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 text-center">
                    <button class="btn btn-primary w-100 fw-bold"> <i class="fa-solid fa-money-bill"></i> Pay
                        Now</button>
                </div>
            </div>
        </form>
        <div class="row justify-content-md-center my-5 py-5">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Technology</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sr = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $sr }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->courses }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        @if (empty($item->paymentId))
                                            <span class="text-danger">Pending</span>
                                        @else
                                            <span class="text-success">Succes</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (empty($item->paymentId))
                                            <a href="{{ '/paycourses/' . $item->id }}" class="btn-danger btn-sm">PayNow</a>
                                        @else
                                            <span class="text-success"><i class="fa-solid fa-money-bill"></i></span>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $sr++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- js --}}
    @include('jsLink')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @if (!empty(($amount = Session::get('amount'))) && !empty(($rzpOrder = Session::get('rzpOrder'))))
        <script>
            payNow({{ $amount }}, "{{ $rzpOrder }}");

            function payNow(amount, rzpOrder) {
                var options = {
                    "key": "{{ env('RZP_API_KEY') }}",
                    "amount": amount * 100,
                    "currency": "INR",
                    "name": "Purchasing Courses",
                    "description": "Laravel CRUD",
                    "image": "https://d6xcmfyh68wv8.cloudfront.net/favicon.png?v=2",
                    "order_id": rzpOrder,
                    "callback_url": "{{ route('orderSuccess') }}",
                    "prefill": {
                        "name": "Mr Ravi",
                        "email": "raviup198@gmail.com",
                        "contact": "7521878584"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        </script>
    @endif
</body>

</html>

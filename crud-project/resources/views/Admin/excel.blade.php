<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/headLink')
</head>

<body>
    <div class="container">
        @include('Admin/navbar')
        <h2 class="text-center mt-4">Excel Import</h2>
        <form action="{{ url('/excelImport') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <input type="file" name="excel" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <button class="input-group-text btn btn-info text-light fw-bold" id="basic-addon2">Import</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row justify-content-md-center my-5 py-5">
            <div class="col-lg-12">
                <div class="table-responsive">
                    {{-- <table id="example" class="table" style="width:100%">
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
                                </tr>
                                @php
                                    $sr++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- js --}}
    @include('jsLink')
</body>

</html>

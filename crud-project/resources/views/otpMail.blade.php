<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP</title>
</head>

<body>
    <h4>Dear {{ $mailData['title'] }} user,</h4>
    <p>Your One Time PIN is: <b>{{ $mailData['body'] }}</b></p>

    @php
        $date = now()->timezone('Asia/Kolkata')->format('Y-m-d h:i:s A');
    @endphp

    <p>(Generated at {{ $date }})</p>
    <hr>
    <p>This is an auto-generated email, so please do not reply back.</p>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animatede Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-form">
        <div class="text">
            USER REGISTRATION FORM
        </div>

        <form action="pro_animatedeForm" method="post">
            @csrf
            <div class="field">
                <div class="fas fa-user"></div>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" autocomplete="off">
            </div>
            <div class="field">
                <div class="fas fa-solid fa-envelope"></div>
                <input type="email" name="email" id="email" placeholder="Enter Your Email" autocomplete="off">
            </div>
            <div class="field">
                <div class="fas fa-mobile"></div>
                <input type="text" name="mobile" id="mobile" placeholder="Enter Your Mobile" autocomplete="off">
            </div>
            <div class="field">
                <div class="fas fa-lock"></div>
                <input type="password" name="password" id="password" placeholder="Enter Your Password" autocomplete="off">
            </div>
            <button>Register Now</button>
            
            <div class="link">
                Already Registered ?
                <a href="#">Login Now</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

    @if ($message = session('success'))
        <script>
            $.notify("{{ $message }}", "success");
        </script>
    @endif
</body>

</html>

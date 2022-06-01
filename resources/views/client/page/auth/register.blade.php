<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('client/login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('client/login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('client/login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('client/login/css/style.css') }}">
    @livewireStyles
    <title>Booking Car | Đăng nhập</title>
</head>
<body>


<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url({{ asset('client/login/images/bg_1.jpg') }});"></div>
    <div class="contents order-2 order-md-1">

        @livewire('client.register')
    </div>


</div>


@livewireScripts
<script src="{{ asset('client/login/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('client/login/js/popper.min.js') }}"></script>
<script src="{{ asset('client/login/js/bootstrap.min.js') }}js/bootstrap.min.js"></script>
<script src="{{ asset('client/login/js/main.js') }}"></script>
</body>
</html>

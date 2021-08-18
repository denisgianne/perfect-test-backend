<html lang='pt-br'>

<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Perfect Pay - Teste - @yield('title')</title>
    <link href="{{ asset('/images/brand/favicon.png') }}" rel="icon" type="image/png" />
    <link rel='stylesheet' href="{{ url('/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        .wrapper #wrapperContent,
        .wrapper #wrapperContent.closed {
            padding: 0;
        }

    </style>
</head>

<body>
    <!-- NAVBAR TOP -->
    @include('base.header')
    <div class='wrapper'>
        <div id='wrapperContent' class='content container-fluid'>
            <div id='main'>
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-dark" href="#">website.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="{{ url('/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/d712964458.js" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>

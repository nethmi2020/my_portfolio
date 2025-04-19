<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Yasser Elgammal') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('import/assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">

    
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('import/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('import/assets/css/style.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand ml-lg-3">
            {{-- <h1 class="m-0 display-5"><span class="text-primary">Free</span>Folio</h1> --}}
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#qualification" class="nav-item nav-link">Qualification</a>
                <a href="#skill" class="nav-item nav-link">Skill</a>
                {{-- <a href="#service" class="nav-item nav-link">Service</a> --}}
                <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                {{-- <a href="#testimonial" class="nav-item nav-link">Review</a> --}}
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
            {{-- <a href="" class="btn btn-outline-primary d-none d-lg-block">Hire Me</a> --}}
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
   <!-- Replace Bootstrap 4 with Bootstrap 5 -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="{{ asset('import/assets/lib/typed/typed.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="{{ asset('import/assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js"></script>

    <script src="{{ asset('import/assets/mail/contact.js') }}"></script>

    <!-- Portfolio Filter Initialization -->
    <script>
        $(document).ready(function() {
            // Initialize Isotope
            var portfolioIsotope = $('.portfolio-container').isotope({
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            }).on('arrangeComplete', function() {
                console.log('Isotope successfully arranged!');
            });
            // Filter items on click
            $('#portfolio-flters li').on('click', function() {
                // console.log($(this))
                $('#portfolio-flters li').removeClass('active');
                $(this).addClass('active');

                // Filter portfolio items
                var filterValue = $(this).attr('data-filter');
                console.log(filterValue)
                portfolioIsotope.isotope({
                    filter: filterValue

                });
            });
        });
    </script>

    <!-- Template Javascript -->
    <script src="{{ asset('import/assets/js/main.js') }}"></script>
</body>

</html>

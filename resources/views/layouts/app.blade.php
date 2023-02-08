<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UpConstruction</title>

    <!-- Favicons -->
    <link href="{{ asset('template/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/assets/css/main.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- ======= Header ======= -->
        <header id="header" class="header d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <a href="index.html" class="logo d-flex align-items-center">
                    <h1>UpConstruction<span>.</span></h1>
                </a>

                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
                <nav id="navbar" class="navbar">
                    <ul>
                        @if (session()->has('user'))
                            <li><a href="/" class="{{ Request::is('home') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ url('dashboard') }}"
                                    class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                            @if (session('user')['role'] == 'admin' || session('user')['role'] == 'peminjam')
                                <li><a href="{{ url('kendaraan') }}"
                                        class="{{ Request::is('kendaraan') ? 'active' : '' }}">Daftar
                                        Kendaraan</a>
                                </li>
                            @endif
                            <li><a href="{{ route('pinjam.index') }}"
                                    class="{{ Request::is('pinjam') ? 'active' : '' }}">Status</a>
                            </li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <main id="main">
            @yield('content')
        </main>

        {{-- footer --}}
        <footer id="footer" class="footer">
            <div class="footer-content position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-info">
                                <h3>UpConstruction</h3>
                                <p>
                                    A108 Adam Street <br>
                                    NY 535022, USA<br><br>
                                    <strong>Phone:</strong> +1 5589 55488 55<br>
                                    <strong>Email:</strong> info@example.com<br>
                                </p>
                                <div class="social-links d-flex mt-3">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i
                                            class="bi bi-twitter"></i></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i
                                            class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div><!-- End footer info column-->

                        <div class="col-lg-2 col-md-3 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Terms of service</a></li>
                                <li><a href="#">Privacy policy</a></li>
                            </ul>
                        </div><!-- End footer links column-->

                        <div class="col-lg-6 col-md-12 footer-links">
                            <h4>Our Services</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aliquid possimus
                                aspernatur reiciendis pariatur voluptate voluptas veniam fuga est hic eius in vitae,
                                quasi, magni sapiente dicta, eum quas delectus!</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea vitae molestiae cum illo
                                dolore sint doloremque enim aliquam possimus corporis?</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, ab veritatis repudiandae
                                itaque veniam explicabo, recusandae quae iusto minima eaque quos magni laborum placeat
                                beatae molestiae id possimus dolor. Quaerat impedit voluptatem quae minus iste alias
                                amet corrupti accusamus minima.</p>
                        </div><!-- End footer links column-->
                    </div>
                </div>
            </div>
            <div class="footer-legal text-center position-relative">
                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong><span>UpConstruction</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Powered by <a href="https://bootstrapmade.com/">Asadin.co</a>
                    </div>
                </div>
            </div>

        </footer>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#pesan").fadeOut();
            }, 3000);
            console.log('test');
        });
    </script>

</body>

</html>

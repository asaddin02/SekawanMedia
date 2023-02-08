<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UpConstruction</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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

    <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

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
                    <li><a href="{{ url('/') }}" class="active">Home</a></li>
                    @if (session()->has('user'))
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        @if (session('user')['role'] == 'admin' || session('user')['role'] == 'peminjam')
                            <li><a href="{{ url('kendaraan') }}">Daftar Kendaraan</a></li>
                        @endif
                        <li><a href="services.html">Status</a></li>
                    @endif
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">Selamat datang di <span>UpConstruction</span></h2>
                        <p data-aos="fade-up">UpConstruction merupakan aplikasi peminjaman alat berat. Mulai gunakan
                            UpConstruction dengan mendaftarkan diri anda terlebih dahulu dan gunakan pelayanan kami.</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Mulai</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url({{ asset('template/assets/img/hero-carousel/hero-carousel-1.jpg') }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('template/assets/img/hero-carousel/hero-carousel-2.jpg') }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('template/assets/img/hero-carousel/hero-carousel-3.jpg') }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('template/assets/img/hero-carousel/hero-carousel-4.jpg') }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('template/assets/img/hero-carousel/hero-carousel-5.jpg') }})">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">

        @guest
            <!-- ======= Get Started Section ======= -->
            <section id="get-started" class="get-started section-bg">
                <div class="container">

                    <div class="row justify-content-between gy-4">

                        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                            <div class="content">
                                <h3>Login</h3>
                                <p>Masuk kehalaman utama jika username dan password anda sudah di daftarkan oleh Admin atau
                                    daftar otomatis sebagai peminjam</p>
                            </div>
                        </div>

                        <div class="col-lg-5" data-aos="fade">
                            @if (Session::has('error'))
                                <div class="col-lg-12 z-index" id="pesan">
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <div class="fw-bolder">
                                            <i class="fa-solid fa-square-check"></i> {{ Session::get('error') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <form action="{{ route('masuk') }}" method="post" class="php-email-form">
                                @csrf
                                <h3>Login here</h3>
                                <p>Jika belum mempunyai akun silahkan lakukan registrasi atau mendaftar <a
                                        href="{{ route('user.index') }}">di sini</a></p>
                                <div class="row gy-3">

                                    <div class="col-md-12">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Username" required>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit">Login</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- End Quote Form -->

                    </div>

                </div>
            </section><!-- End Get Started Section -->
        @endguest

        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Alat Berat</h2>
                    <p>Kendaraan yang tersedia di UpConstruction</p>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                        @foreach ($kendaraans as $kendaraan)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                <div class="portfolio-content h-100">
                                    <img src="{{ asset('storage/' . $kendaraan->gambar) }}" class="img-fluid"
                                        alt="">
                                    <div class="portfolio-info">
                                        <a href="{{ asset('storage/' . $kendaraan->gambar) }}"
                                            class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach

                    </div><!-- End Projects Container -->

                </div>

            </div>
        </section><!-- End Our Projects Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>UpConstruction<span>.</span></h3>
                            <p>
                                Randupitu, Gempol, Pasuruan <br>
                                67155, Indonesia<br><br>
                                <strong>Phone:</strong> +62 857 0615 1662<br>
                                <strong>Email:</strong> prasada.arif@gmail.com<br>
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
                            <li><a href="index.html" class="active">Home</a></li>
                            <li><a href="about.html">Dashboard</a></li>
                            <li><a href="projects.html">Daftar Kendaraan</a></li>
                            <li><a href="services.html">Status</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Product Management</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Graphic Design</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Hic solutasetp</h4>
                        <ul>
                            <li><a href="#">Molestiae accusamus iure</a></li>
                            <li><a href="#">Excepturi dignissimos</a></li>
                            <li><a href="#">Suscipit distinctio</a></li>
                            <li><a href="#">Dilecta</a></li>
                            <li><a href="#">Sit quas consectetur</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Nobis illum</h4>
                        <ul>
                            <li><a href="#">Ipsam</a></li>
                            <li><a href="#">Laudantium dolorum</a></li>
                            <li><a href="#">Dinera</a></li>
                            <li><a href="#">Trodelas</a></li>
                            <li><a href="#">Flexo</a></li>
                        </ul>
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
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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

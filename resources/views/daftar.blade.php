@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('template/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Registrasi</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Registrasi</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 mt-1">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="content">
                        <h3>Form Register</h3>
                        <p>Buat akun anda dan simpan setelah selesai</p>
                    </div>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    @if (Session::has('success'))
                        <div class="col-lg-12 z-index" id="pesan">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <div class="fw-bolder">
                                    <i class="fa-solid fa-square-check"></i> {{ Session::get('success') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="col-lg-12 z-index" id="pesan">
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div class="fw-bolder">
                                    <i class="fa-solid fa-square-check"></i> {{ Session::get('error') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('user.store') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <h2>Form Registrasi</h2>
                        <div class="row gy-4">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Your Username" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Your Password" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="password" class="form-control" name="confirm_password" id="password"
                                    placeholder="Confirm Password" required>
                            </div>
                            <input type="hidden" name="role" value="peminjam">
                        </div>
                        <div class="text-center"><button type="submit">Daftar</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection

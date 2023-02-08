@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('template/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Tambah Kendaraan</h2>
            <ol>
                <li><a href="{{ route('kendaraan.index') }}">Home</a></li>
                <li>Tambah Kendaraan</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 mt-1">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="content">
                        <h3>Form Tambah Kendaraan</h3>
                        <p>Buat akun anda dan simpan setelah salesai</p>
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
                    <form action="{{ route('kendaraan.store') }}" method="post" role="form" class="php-email-form"
                        enctype="multipart/form-data">
                        @csrf
                        <h2 class="mb-3">Form Tambah Kendaraan</h2>
                        <div class="row gy-4">
                            <div class="col-lg-12 form-group">
                                <input type="text" name="nama_kendaraan" class="form-control" id="nama_kendaraan"
                                    placeholder="Nama Kendaraan" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <select name="jenis" id="" class="form-control">
                                    <option value="Muatan">Muatan</option>
                                    <option value="non muatan">Non Muatan</option>
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="file" name="gambar" id="gambar" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="text" class="form-control" name="nomor_kendaraan" id="nomor_kendaraan"
                                    placeholder="Nomor Kendaraan" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="number" class="form-control" name="kapasitas" id="kapasitas"
                                    placeholder="Kapasitas Kendaraan" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="text" class="form-control" name="fungsi" id="fungsi"
                                    placeholder="Kegunaan" required>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit">Submit</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection

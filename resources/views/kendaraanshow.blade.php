@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('template/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Kendaraan</h2>
            <ol>
                <li><a href="{{ route('kendaraan.index') }}">Home</a></li>
                <li>Kendaraan</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 mt-1">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('storage/' . $kendaraan->gambar) }}" class="img-fluid" alt="">
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
                    <div class="card border-warning">
                        <div class="card-header bg-warning text-white">
                            <h3>{{ $kendaraan->nama_kendaraan }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table border-0">
                                <tr>
                                    <th>Jenis Kendaraan</th>
                                    <td>:</td>
                                    <td>{{ $kendaraan->jenis }}</td>
                                </tr>
                                <tr>
                                    <th>Kapasitas Kendaraan</th>
                                    <td>:</td>
                                    <td>{{ $kendaraan->kapasitas }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Kendaraan</th>
                                    <td>:</td>
                                    <td>{{ $kendaraan->nomor_kendaraan }}</td>
                                </tr>
                                <tr>
                                    <th>Fungsi Kendaraan</th>
                                    <td>:</td>
                                    <td>{{ $kendaraan->fungsi }}</td>
                                </tr>
                            </table>
                            @if (session('user')['role'] == 'peminjam')
                                <a href="#" class="btn text-white btn-warning" data-bs-toggle="modal"
                                    style="width:100%;" data-bs-target="#pinjam">Pinjam</a>
                            @endif

                        </div>
                    </div>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

    {{-- modal --}}
    <div class="modal fade" id="pinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pinjam.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id_kendaraan" value="{{ $kendaraan->id }}">
                            <input type="hidden" name="id_driver" value="1">
                            <input type="hidden" name="tanggal_peminjaman"
                                value="{{ Carbon\Carbon::now()->toDateString() }}">
                            <input type="text" required class="form-control mb-3" name="tujuan"
                                placeholder="Masukkan Tujuan">
                            <input type="hidden" name="status" value="menunggu persetujuan">
                            <input type="text" required name="durasi_peminjaman" class="form-control mb-3"
                                placeholder="Durasi">
                            <input type="text" required name="keterangan" class="form-control mb-3"
                                placeholder="Keterangan">
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Pinjam" class="btn btn-sm btn-warning text-white">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

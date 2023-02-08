@extends('layouts.app')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('template/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Kendaraan</h2>
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Kendaraan</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">
            @if(session('user')['role'] == 'admin')
            <div class="row">
                <div class="col-lg-4 col-sm-12 mb-5">
                    <a href="{{ route('kendaraan.create') }} " class="btn btn-warning text-white" style="width: 100%"><i
                            class="bi bi-plus"></i>
                        Tambah Kendaraan</a>
                </div>
            </div>
            @endif
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($kendaraans as $kendaraan)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                            <div class="portfolio-content h-100">
                                <img src="{{ asset('storage/' . $kendaraan->gambar) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <a href="{{ asset('storage/' . $kendaraan->gambar) }}" title="view" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="{{ route('kendaraan.show',$kendaraan->id) }}" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Projects Item -->
                    @endforeach

                </div><!-- End Projects Container -->

            </div>

        </div>
    </section><!-- End Our Projects Section -->
@endsection

@extends('layouts.app')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('template/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Dashboard</h2>
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Dashboard</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->
    @if (Session::has('success'))
        <div class="col-lg-12 z-index" id="pesan">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div class="fw-bolder">
                    <i class="fa-solid fa-square-check"></i> {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
@endsection

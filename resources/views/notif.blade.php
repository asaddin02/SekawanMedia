@extends('layouts.app')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('template/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Status</h2>
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Status</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->
    @if (session('user')['role'] == 'persetujuan')
        <section>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($persetujuans) > 0)
                            @foreach ($persetujuans as $persetujuan)
                                <div class="card border-warning">
                                    <div class="card-header bg-warning text-white">
                                        <h5>Notif Persetujuan {{ $loop->iteration }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>Ada persetujuan yang menunggu anda, harap segera melakukan konfirmasi dengan
                                            menekan tombol tolak atau setuju</p>
                                        <form action="{{ route('persetujuan.update', $persetujuan->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="{{ $persetujuan->id_peminjaman }}">
                                            <button type="submit" name="setuju"
                                                class="btn btn-sm btn-success text-white float-start"
                                                style="width: 50%">Setuju</button>
                                            <button type="submit" name="tolak" class="btn btn-sm btn-danger text-white"
                                                style="width: 50%">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @elseif(session('user')['role'] == 'admin')
        <section>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($peminjamans) > 0)
                            @foreach ($peminjamans as $peminjaman)
                                <div class="card border-warning">
                                    <div class="card-header bg-warning text-white">
                                        <h5>Notif Peminjaman {{ $loop->iteration }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('pinjam.update', $peminjaman->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="input-group mb-5">
                                                <label for="" class="form-label mb-3">Penyetuju</label>
                                                <select name="" id="" class="form-control"
                                                    style="width: 100%;">
                                                    @foreach ($penyetujus as $penyetuju)
                                                        <option value="{{ $penyetuju->id }}">{{ $penyetuju->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="" class="form-label mb-3">Pengemudi</label>
                                                <select name="" id="" class="form-control"
                                                    style="width: 100%;">
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}">{{ $driver->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $peminjaman->id }}">
                                            <input type="hidden" name="setuju" value="disetujui">
                                            <input type="hidden" name="tolak" value="ditolak">
                                            <button type="submit" name="setuju"
                                                class="btn btn-sm btn-success text-white float-start"
                                                style="width: 50%">Setuju</button>
                                            <button type="submit" name="tolak" class="btn btn-sm btn-danger text-white"
                                                style="width: 50%">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($peminjamans) > 0)
                            @foreach ($peminjamans as $peminjaman)
                                <div class="card border-warning">
                                    <div class="card-header bg-warning text-white">
                                        <h5>Rencana Peminjaman {{ $loop->iteration }}</h5>
                                    </div>
                                    <div class="card-body">
                                        @if ($peminjaman->status == 'disetujui')
                                            <p>Selamat! Admin dan pihak persetujuan telah <b
                                                    class="text-success">menyetujui</b> permintaan anda.</p>
                                        @elseif($peminjaman->status == 'ditolak')
                                            <p>Mohon maaf, Admin atau pihak persetujuan <b class="text-danger">tidak
                                                    dapat meneruskan</b> permintaan anda.</p>
                                        @else
                                            <p>Pemintaan anda <b class="text-info">sedang diproses</b>,
                                                Mohon tunggu beberapa saat</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

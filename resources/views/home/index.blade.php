@extends('layout.main')

@section('container')
    <section class="col-md-12 section mb-2">
        <div class="card shadow">
            <div class="card-body text-center">
                <h1 class="fw-bold" style="color: #000 !important; ">Selamat Datang di Website</h1>
                <h1 class="fw-bold" style="color: #2e7eed; !important">UMKM Kota Sungai Penuh</h1>
                <img src="{{ asset('/img/bg1.jpg') }}" alt="" style="width: 800px;">
            </div>
        </div>
    </section>
@endsection
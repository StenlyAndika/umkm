@extends('layout.main')

@section('container')
<div class="card">
    <div class="card-body">
        <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3"><i class='bx bx-arrow-back' ></i>&nbsp;Kembali</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{ asset('storage/'.$produk->photo) }}" class="img-fluid rounded-start object-fit-fill" alt="..." style="max-height:435px">
                        </div>
                        <div class="col-lg-7">
                            <div class="card-body">
                                <hr>
                                <h3 class="fw-bold"><i class='bx bxs-store'></i>&nbsp;{{ $produk->nm_perusahaan }}</h3>
                                <hr>
                                <h5 class="card-title">{{ $produk->nm_prdk }}</h5>
                                <p class="card-text">Kategori {{ $produk->bidang_usaha }}</p>
                                <p class="card-text">{!! $produk->deskripsi !!}</p>
                                <p class="card-text fw-bold text-dark">Harga Rp.{{ $produk->harga }}</p>
                                <hr>
                                Alamat Toko : <h3 class="fw-bold"><i class='bx bxs-store-alt' ></i>&nbsp;{{ $produk->alamat_usaha }}</h3>
                                <hr>
                                <a href="https://wa.me/{{ $produk->no_telp }}?text=Halo,%20Apakah%20produk%20masih%20ada?" target="_blank" class="btn btn-primary"><i class='bx bxl-whatsapp' ></i>&nbsp;Pesan Via WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
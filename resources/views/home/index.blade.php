@extends('layout.main')

@section('container')
<div class="card">
    <div class="card-body">
        <div class="card-title col-lg-2">
            <form method="GET" action="{{ url('/') }}">
                <select class="select2-bootstrap4 form-control bg-light fs-6" name="id_bdng_ush" onchange="this.form.submit()">
                    <option value="0" {{ $filter == 0 ? 'selected' : '' }}>Filter</option>
                    @foreach ($bidang_usaha as $item)
                        <option value="{{ $item->id_bdng_ush }}" {{ $filter == $item->id_bdng_ush ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="row product-list">
            @foreach ($produk as $item)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('storage/'.$item->photo) }}" class="card-img-top img-fluid object-fit-fill" alt="..." style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nm_prdk }}</h5>
                            <p class="card-text">{{ $item->bidang_usaha }}</p>
                            <p class="card-text">Rp.{{ $item->harga }}</p>
                            <a href="{{ route('home.detail', $item->id_produk) }}" class="btn btn-primary">Lihat produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $produk->appends(['id_bdng_ush' => $filter])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
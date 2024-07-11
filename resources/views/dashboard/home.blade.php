@extends('layout.admin')

@section('container')
    <div class="container-fluid card">
        <div class="card-header mb-2 border-start border-4 border-4 border-danger">
            <h3 class="mt-2">Event Terbaru</h3>
        </div>
        @foreach ($event as $item)
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">{{ $item->judul }}</h4>
                <p class="mb-0">Diposting pada : {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</p>
                <hr>
                <p class="mb-0">{!! $item->deskripsi !!}</p>
                <hr>
            </div>
        </div>

        @endforeach
    </div>
@endsection
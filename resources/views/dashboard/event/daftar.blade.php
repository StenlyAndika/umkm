@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Daftar Event</h5>
            </div>
            <div class="card-body">          
                <form method="post" action="{{ route('admin.event.daftarevent') }}" autocomplete="off">
                    @csrf
                    @method('post')
                    <input type="hidden" class="form-control" name="ide" value="{{ $event->id }}">
                    <input type="hidden" class="form-control" name="id_ukm" value="{{ $ukm->id_ukm }}">
                    <h5 class="card-title fw-semibold mb-4">{{ $event->judul }}</h4>
                        <p class="mb-0">Diposting pada : {{ \Carbon\Carbon::parse($event->created_at)->format('d-m-Y') }}</p>
                        <p class="mb-0 text-danger">Dilaksanakan pada : {{ \Carbon\Carbon::parse($event->tgl)->format('d-m-Y') }}</p>
                        <hr>
                        <p class="mb-0">{!! $event->deskripsi !!}</p>
                        <hr>
                    <p class="mb-2 text-danger">Kuota Tersisa : {{ $event->kuota }}</p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Daftar</button>
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.dashboard') }}">Batal</a>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
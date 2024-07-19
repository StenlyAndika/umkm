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
                    <p class="mb-0 text-danger">Dilaksanakan pada : {{ \Carbon\Carbon::parse($item->tgl)->format('d-m-Y') }}</p>
                    <hr>
                    <p class="mb-0">{!! $item->deskripsi !!}</p>
                    <hr>
                    <p class="mb-2 text-danger">Jumlah Kuota : {{ $item->kuota }}</p>
                    @php
                        $cek = App\Models\Peserta::where('id_ukm', $ukm->id_ukm)->first()
                    @endphp
                    @if ($cek != null)
                        @if ($cek->status == "0")
                            <a href="#" class="text-secondary">Sudah mendaftar - Belum divalidasi</a>
                        @elseif ($cek->status == "1")
                            <a href="#" class="text-primary">Status pendaftaran divalidasi</a>
                        @else
                            <a href="#" class="text-danger">Status pendaftaran ditolak</a>
                        @endif
                    @else
                        @if($item->kuota == 0)
                            <a href="#" class="text-success">Kuota Sudah Terpenuhi</a>
                        @else
                            <a href="{{ route('admin.event.daftar', $item->id) }}" class="btn btn-primary">Daftar</a>
                        @endif
                    @endif
                </div>
            </div>

        @endforeach
    </div>
@endsection
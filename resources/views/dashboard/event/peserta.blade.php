@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Data Peserta Event</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: left;">Judul</th>
                                <th style="text-align: left;">Tgl Pelaksanaan</th>
                                <th style="text-align: left;">Nama UKM</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $row)
                            @php
                                $evt = App\Models\Event::where('id', $row->ide)->first()
                            @endphp
                            <tr>
                                <td style="text-align: left;">{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ $evt->judul }}</td>
                                <td style="text-align: left;">{{ $evt->tgl }}</td>
                                <td style="text-align: left;">
                                @php
                                    $cek = App\Models\Ukm::where('id_ukm', $row->id_ukm)->first()
                                @endphp
                                {{ $cek->nm_perusahaan }}
                                </td>
                                <td style="text-align: center;">
                                    @if ($row->status == "0")
                                        <form action="{{ route('admin.event.pesertaverif', $row->id) }}" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-sm btn-secondary setTerima">Verifikasi</button>
                                        </form>
                                        <form action="{{ route('admin.event.pesertatolak', $row->id) }}" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-sm btn-danger setTolak">Tolak</button>
                                        </form>
                                    @else
                                        <a href="#" class="text-danger">Sudah Mendaftar</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
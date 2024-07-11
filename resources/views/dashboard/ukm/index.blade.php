@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Data UKM</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: left;">Nama Usaha</th>
                                <th style="text-align: left;">Bidang Usaha</th>
                                <th style="text-align: left;">Kelas Usaha</th>
                                <th style="text-align: left;">Jumlah Tenaga Kerja</th>
                                <th style="text-align: left;">Nama Pemilik</th>
                                <th style="text-align: left;">Aset</th>
                                <th style="text-align: left;">Omset</th>
                                <th style="text-align: left;">Status</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ukm as $row)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ $row->nm_perusahaan }}</td>
                                <td style="text-align: left;">{{ $row->bidang_usaha }}</td>
                                <td style="text-align: left;">{{ $row->kelas_usaha }}</td>
                                <td style="text-align: left;">{{ $row->jml_tng_krj }}</td>
                                <td style="text-align: left;">{{ $row->nama_pemilik }}</td>
                                <td style="text-align: left;">{{ $row->aset }}</td>
                                <td style="text-align: left;">{{ $row->omset }}</td>
                                <td style="text-align: left;">
                                    @if ($row->is_verified == "0")
                                        <a href="#" class="btn btn-block btn-sm btn-secondary">Belum Diverifikasi</a>
                                    @elseif ($row->is_verified == "1")
                                        <a href="#" class="btn btn-block btn-sm btn-primary">Telah Diverifikasi</a>
                                    @else
                                        <a href="#" class="btn btn-block btn-sm btn-danger">Ditolak</a>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($row->is_verified == "0")
                                        <form action="{{ route('admin.user.updateverif', $row->user_id) }}" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-sm btn-secondary setVerified">Verifikasi</button>
                                        </form>
                                        <form action="{{ route('admin.user.updatereject', $row->user_id) }}" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-sm btn-danger setRejected">Tolak</button>
                                        </form>
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
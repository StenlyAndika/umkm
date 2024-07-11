@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Rekap Desa</h5>
                <div class="d-flex">
                    <form method="GET" action="{{ url('/admin/ukm/laporan') }}">
                        <select class="select2-bootstrap4 form-control bg-light fs-6" name="id" onchange="this.form.submit()">
                            <option value="0" {{ $filter == 0 ? 'selected' : '' }}>Filter</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ $filter == $item->id ? 'selected' : '' }}>
                                    {{ $item->desa }}
                                </option>
                            @endforeach
                        </select>
                    </form>&nbsp;
                    <form method="GET" action="{{ url('/admin/ukm/cetak_per_desa') }}">
                        <input type="hidden" name="id" value="{{ $filter }}">
                        <button type="submit" class="btn btn-sm btn-primary me-3 align-middle">Cetak Laporan</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: left;">Nama Pemilik</th>
                            <th style="text-align: left;">NIK</th>
                            <th style="text-align: left;">Nama Usaha</th>
                            <th style="text-align: left;">No NPWP</th>
                            <th style="text-align: left;">Bidang Usaha</th>
                            <th style="text-align: left;">Sektor Usaha</th>
                            <th style="text-align: left;">Alamat Usaha</th>
                            <th style="text-align: left;">Aset</th>
                            <th style="text-align: left;">Omset</th>
                            <th style="text-align: left;">Klasifikasi</th>
                            <th style="text-align: left;">Jumlah Tenaga Kerja</th>
                        </tr>
                        @foreach ($ukm as $row)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: left;">{{ $row->nama_pemilik }}</td>
                            <td style="text-align: left;">{{ $row->nik }}</td>
                            <td style="text-align: left;">{{ $row->nm_perusahaan }}</td>
                            <td style="text-align: left;">{{ $row->no_npwp }}</td>
                            <td style="text-align: left;">{{ $row->bidang_usaha }}</td>
                            <td style="text-align: left;">{{ $row->sektor_usaha }}</td>
                            <td style="text-align: left;">Desa {{ $row->almt_usaha }}</td>
                            <td style="text-align: left;">{{ $row->aset }}</td>
                            <td style="text-align: left;">{{ $row->omset }}</td>
                            <td style="text-align: left;">{{ $row->kelas_usaha }}</td>
                            <td style="text-align: left;">{{ $row->jml_tng_krj }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
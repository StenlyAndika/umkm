@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Rekap Kecamatan</h5>
                <div class="d-flex">
                    <form method="GET" action="{{ url('/admin/ukm/laporankecamatan') }}">
                        <select class="select2-bootstrap4 form-control bg-light fs-6" name="id" onchange="this.form.submit()">
                            <option value="0" {{ $filter == 0 ? 'selected' : '' }}>Filter</option>
                            <option value="Sungai Penuh" {{ $filter == 'Sungai Penuh' ? 'selected' : '' }}>Sungai Penuh</option>
                            <option value="Pesisir Bukit" {{ $filter == 'Pesisir Bukit' ? 'selected' : '' }}>Pesisir Bukit</option>
                            <option value="Hamparan Rawang" {{ $filter == 'Hamparan Rawang' ? 'selected' : '' }}>Hamparan Rawang</option>
                            <option value="Tanah Kampung" {{ $filter == 'Tanah Kampung' ? 'selected' : '' }}>Tanah Kampung</option>
                            <option value="Kumun Debai" {{ $filter == 'Kumun Debai' ? 'selected' : '' }}>Kumun Debai</option>
                            <option value="Pondok Tinggi" {{ $filter == 'Pondok Tinggi' ? 'selected' : '' }}>Pondok Tinggi</option>
                            <option value="Koto Baru" {{ $filter == 'Koto Baru' ? 'selected' : '' }}>Koto Baru</option>
                            <option value="Sungai Bungkal" {{ $filter == 'Sungai Bungkal' ? 'selected' : '' }}>Sungai Bungkal</option>
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
                            <th style="text-align: center;" rowspan="2">#</th>
                            <th style="text-align: left;" rowspan="2">Kelurahan/Desa</th>
                            <th style="text-align: left;" colspan="4">UMKM</th>
                            <th style="text-align: left;" rowspan="2">Aset</th>
                            <th style="text-align: left;" rowspan="2">Omset</th>
                            <th style="text-align: left;" rowspan="2">Tenaga Kerja</th>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Mikro</th>
                            <th style="text-align: left;">Kecil</th>
                            <th style="text-align: left;">Menengah</th>
                            <th style="text-align: left;">Total</th>
                        </tr>
                        @foreach ($ukm as $row)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: left;">{{ $row->almt_usaha }}</td>
                            <td style="text-align: left;">{{ $row->totalmikro }}</td>
                            <td style="text-align: left;">{{ $row->totalkecil }}</td>
                            <td style="text-align: left;">{{ $row->totalmenengah }}</td>
                            <td style="text-align: left;">{{ $row->totalmikro+$row->totalkecil+$row->totalmenengah }}</td>
                            <td style="text-align: left;">{{ $row->totalaset }}</td>
                            <td style="text-align: left;">{{ $row->totalomset }}</td>
                            <td style="text-align: left;">{{ $row->totaltngkrj }}</td>
                            
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
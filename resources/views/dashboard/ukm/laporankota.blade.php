@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Rekap Kota Sungai Penuh</h5>
                <div class="d-flex">
                    <a href="{{ route('admin.ukm.cetak_per_kota') }}" class="btn btn-sm btn-primary me-3 align-middle">Cetak Laporan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th style="text-align: center;" rowspan="2">#</th>
                            <th style="text-align: left;" rowspan="2">Kecamatan</th>
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
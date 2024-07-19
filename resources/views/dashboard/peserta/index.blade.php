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
                                <th style="text-align: left;">Deskripsi</th>
                                <th style="text-align: left;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $row)
                            <tr>
                                <td style="text-align: left;">{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ $row->judul }}</td>
                                <td style="text-align: left;">{{ $row->tgl }}</td>
                                <td style="text-align: left;">{!! $row->deskripsi !!}</td>
                                <td style="text-align: left;">
                                    @php
                                        $ee = App\Models\Peserta::where('ide', $row->id)->first()
                                    @endphp
                                    @if ($ee->status == "1")
                                        Terdaftar
                                    @elseif ($ee->status == "2")
                                        Ditolak
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
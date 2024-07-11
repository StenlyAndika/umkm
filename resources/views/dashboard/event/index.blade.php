@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Data Event</h5>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#tambahEvent">
                    Data Baru
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: left;">Judul</th>
                                <th style="text-align: left;">Deskripsi</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $row)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: center;">{{ $row->judul }}</td>
                                <td style="text-align: left;">{!! $row->deskripsi !!}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('admin.event.edit', $row->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                    <form action="{{ route('admin.event.destroy', $row->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger hapusDataM">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hiden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('admin.event.store') }}" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <label class="form-label">Judul Event</label>
                            <input type="text" class="form-control" name="judul" value="">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Deskripsi Event</label>
                            <input type="hidden" id="deskripsi" name="deskripsi">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
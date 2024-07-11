@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Data Desa</h5>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#tambahDesa">
                    Data Baru
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: left;">Desa</th>
                                <th style="text-align: left;">Kecamatan</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desa as $row)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: center;">{{ $row->desa }}</td>
                                <td style="text-align: left;">{!! $row->kecamatan !!}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('admin.desa.edit', $row->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                    <form action="{{ route('admin.desa.destroy', $row->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger hapusDesa">Hapus</button>
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
    <div class="modal fade" id="tambahDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hiden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('admin.desa.store') }}" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <label class="form-label">Nama Desa</label>
                            <input type="text" class="form-control" name="desa" value="">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Kecamatan</label>
                            <select class="select2-bootstrap4 select2a form-control bg-light fs-6" name="kecamatan">
                                <option value="0" selected>Pilih</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
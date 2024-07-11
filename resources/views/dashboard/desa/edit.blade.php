@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Ubah Data</h5>
            </div>
            <div class="card-body">          
                <form method="post" action="{{ route('admin.desa.update', $desa->id) }}" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Nama Desa</label>
                        <input type="text" class="form-control" name="desa" value="{{ $desa->judul }}">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Kecamatan</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" name="kecamatan">
                                <option value="0" selected>Pilih</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item }}"" @if ($desa->kecamatan == $item) selected @endif>{{ $item }}</option>
                                @endforeach
                            </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.desa.index') }}">Batal</a>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
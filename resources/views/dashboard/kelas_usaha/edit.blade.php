@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Ubah Data</h5>
            </div>
            <div class="card-body">          
                <form method="post" action="{{ route('admin.kelas_usaha.update', $kelas_usaha->id_kls_ush) }}" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" value="{{ $kelas_usaha->nama }}">
                        <label for="nama">Kelas</label>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.kelas_usaha.index') }}">Batal</a>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Data Admin</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('regadmin') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Kependudukan</label>
                        <input type="text" class="form-control" name="nik">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
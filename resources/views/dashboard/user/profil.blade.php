@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Pengaturan Akun</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.user.update', $user->id) }}" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ $user->username }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control @error('passwordlama') is-invalid @enderror" id="passwordlama" name="passwordlama" placeholder="Passwordlama" value="{{ $user->password }}">
                        <label for="passwordlama">Password Lama</label>
                        @error('passwordlama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="">
                        <label for="password">Password Baru</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary btn-round">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
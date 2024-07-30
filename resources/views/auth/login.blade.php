@extends('layout.main')

@section('container')
<div class="d-flex justify-content-center align-items-center col-lg-12 text-center">
    <div class="col-md-7 d-flex justify-content-center align-items-center">
        <div class="row border rounded-5 bg-glass shadow box-area">
            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-2 mt-2">
                    <img src="/img/tablogo.webp" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-primary fs-2 mb-0 fw-bold">UMKM</p>
                <h4 class="mb-4 text-primary text-wrap text-center fw-bold">Kota Sungai Penuh</h4>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-3 mt-3">
                        <h3 class="fw-bold">Selamat datang</h3>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('loginError'))
                        <div class="container">
                            <div class="alert alert-danger">
                                {{ session('loginError') }}
                            </div>
                        </div>
                    @else
                        <div class="container">
                            <div class="alert alert-primary">
                                Masukkan username dan password untuk melanjutkan
                            </div>
                        </div>
                    @endif
                    <form class="p-2" action="{{ route('auth') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingUsername" name="username" placeholder="Username">
                            <label for="floatingUsername">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-md btn-primary w-100">Login</button>
                            <a href="{{ route('daftar') }}" class="btn btn-md w-100 btn-danger mt-2">Daftar</a>
                        </div>
                    </form>
                    @can('checksuper')
                    <form action="{{ route('generateSuper') }}" method="post">
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6 mb-5">Register Super Admin</button>
                    </form>
                @endcan
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
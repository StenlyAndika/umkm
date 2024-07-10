@extends('layout.main')
@section('container')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('welcome') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="/img/tablogo.webp" width="50" alt="">
                                </a>
                                <h3 class="text-center">UMKM Kota Sungai Penuh</h3>
                                <form method="post" action="{{ route('regadmin') }}">
                                    @csrf
                                    <hr>
                                    <h3>Data Super Admin</h3>
                                    <hr>
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
                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Daftar</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route('welcome') }}">Login disini</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
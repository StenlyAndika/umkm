@extends('layout.main')
@section('container')
    <div class="container mt-lg-5 mb-lg-5 d-flex justify-content-center align-items-center min-vh-100" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="row border rounded-5 bg-glass shadow box-area">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="{{ route('welcome') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <img src="/img/tablogo.webp" width="50" alt="">
                    </a>
                    <h3 class="text-center">UMKM Kota Sungai Penuh</h3>
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <hr>
                        <h3>Data Usaha</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Nama Usaha</label>
                            <input type="text" class="form-control" name="nm_perusahaan" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Usaha</label>
                            <input type="hidden" id="deskripsi" name="deskripsi">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bidang Usaha</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" name="id_bdng_ush">
                                <option value="0" selected>Pilih</option>
                                @foreach ($bidang_usaha as $item)
                                    <option value="{{ $item->id_bdng_ush }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas Usaha</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" name="kelas_usaha">
                                <option value="0" selected>Pilih</option>
                                @foreach ($kelas_usaha as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sektor Usaha</label>
                            <input type="text" class="form-control" name="sektor_usaha">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">NPWP</label>
                            <input type="text" class="form-control" name="no_npwp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kecamatan</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" id="kecamatan_id">
                                <option value="0" selected>Pilih</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Desa</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" id="desa_id" name="almt_usaha">
                                <option value="0" selected>Pilih</option>
                                <!-- Desa options will be populated dynamically -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Tenaga Kerja</label>
                            <input type="text" class="form-control" name="jml_tng_krj">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aset</label>
                            <input type="text" class="form-control @error('aset') is-invalid @enderror" name="aset">
                            @error('aset')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Omset</label>
                            <input type="text" class="form-control @error('omset') is-invalid @enderror" name="omset">
                            @error('omset')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <h3>Data Pemilik Usaha</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control" name="nik">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tgl_lahir" id="datepicker">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" name="jekel">
                                <option value="0" selected>Pilih</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
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
                            <p class="mb-0 fw-bold">Sudah punya akun?</p>
                            <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Login disini</a>
                        </div>
                    </form>
                </div>
            </div>
                    {{-- </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@extends('layout.admin')

@section('container')
    <div class="card radius-10 full-height">
        <div class="card-header">
            <h5 class="mt-2">Pendaftaran Pasien</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.pendaftaran.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="caripasien" name="nama" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-sm btn-success" id="pasbaru">
                                    Pasien Baru
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Nomor Induk Kependudukan</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="nik" name="nik" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>No Antrian</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="noantrian" name="noantrian" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Nomor Rekam Medis</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="nomr" name="nomr" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Status Pasien</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="status" name="status" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1" style="width: 40%;">
                                    <input type="number" class="form-control" id="tgl" name="tgl" value="" placeholder="20">
                                </div>
                                &nbsp;
                                <div class="input-group mb-1" style="width: 40%;">
                                    <input type="number" class="form-control" id="bln" name="bln" value="" placeholder="02">
                                </div>
                                &nbsp;
                                <div class="input-group mb-1">
                                    <input type="number" class="form-control" id="thn" name="thn" value="" placeholder="2000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Poli Tujuan</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <select class="select2-bootstrap4 form-control bg-light fs-6" id="poli" name="poli">
                                        <option value="0" selected>Pilih Poli</option>
                                        @foreach ($poli as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Nama Kepala Keluarga</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="namakk" name="namakk" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Pembayaran</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <select class="select2-bootstrap4 form-control bg-light fs-6" id="pembayaran" name="pembayaran">
                                        <option value="0" selected>Pilih Pembayaran</option>
                                        <option value="1">Umum</option>
                                        <option value="2">BPJS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <select class="select2-bootstrap4 form-control bg-light fs-6" id="jekel" name="jekel">
                                        <option value="0" selected>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" name="keterangan" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Alamat</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <label>Nomor HP</label>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="nohp" name="nohp" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary btn-round">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
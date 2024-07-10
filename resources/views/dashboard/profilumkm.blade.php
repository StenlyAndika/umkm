@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.profilumkm.update', $ukm->id_ukm) }}">
                    @csrf
                    @method('put')
                    <hr>
                    <h3 class="mb-3">Profil {{ $ukm->nm_perusahaan }}</h3>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <label class="form-label">Deskripsi Usaha</label>
                            <input type="hidden" name="id_ukm" value="{{ $ukm->id_ukm }}">
                            <input type="hidden" id="deskripsi" name="deskripsi" value="{{ $ukm->deskripsi }}">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <label class="form-label">Bidang Usaha</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" name="id_bdng_ush">
                                <option value="0" selected>Pilih</option>
                                @foreach ($bidang_usaha as $item)
                                    <option value="{{ $item->id_bdng_ush }}"
                                    @if ($item->id_bdng_ush == $ukm->id_bdng_ush)
                                        selected
                                    @endif >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Kelas Usaha</label>
                            <select class="select2-bootstrap4 form-control bg-light fs-6" name="id_kls_ush">
                                <option value="0" selected>Pilih</option>
                                @foreach ($kelas_usaha as $item)
                                    <option value="{{ $item->id_kls_ush }}"
                                    @if ($item->id_kls_ush == $ukm->id_kls_ush)
                                        selected
                                    @endif >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <label class="form-label">Nomor NPWP</label>
                            <input type="text" class="form-control" name="no_npwp" value="{{ $ukm->no_npwp }}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Sektor Usaha</label>
                            <input type="text" class="form-control" name="sektor_usaha" value="{{ $ukm->sektor_usaha }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <label class="form-label">Alamat Usaha</label>
                            <input type="text" class="form-control" name="almt_usaha" value="{{ $ukm->almt_usaha }}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Jumlah Tenaga Kerja</label>
                            <input type="text" class="form-control" name="jml_tng_krj" value="{{ $ukm->jml_tng_krj }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <label class="form-label">Aset</label>
                            <input type="text" class="form-control" name="aset" value="{{ $ukm->aset }}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Omset</label>
                            <input type="text" class="form-control" name="omset" value="{{ $ukm->omset }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <label class="form-label">Nomor Telp/WA</label>
                            <input type="text" class="form-control" name="no_telp" value="{{ $ukm->no_telp }}">
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
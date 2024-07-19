@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            @if ($instansi == null)
                <div class="card-body">
                    <form method="post" action="{{ route('admin.instansi.store') }}">
                        @csrf
                        <hr>
                        <h3 class="mb-3">Profil Instansi</h3>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <label class="form-label">Tentang Instansi</label>
                                <input type="hidden" id="tentang" name="tentang" value="">
                                <trix-editor input="tentang"></trix-editor>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <label class="form-label">Visi & Misi</label>
                                <input type="hidden" id="visi" name="visi" value="">
                                <trix-editor input="visi"></trix-editor>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Tugas & Wewenang</label>
                                <input type="hidden" id="tugas" name="tugas" value="">
                                <trix-editor input="tugas"></trix-editor>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Simpan</button>
                    </form>
                </div>
            @else
                <div class="card-body">
                    <form method="post" action="{{ route('admin.instansi.update', $instansi->id) }}">
                        @csrf
                        @method('put')
                        <hr>
                        <h3 class="mb-3">Profil Instansi</h3>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <label class="form-label">Tentang Instansi</label>
                                <input type="hidden" name="id" value="{{ $instansi->id }}">
                                <input type="hidden" id="tentang" name="tentang" value="{{ $instansi->tentang }}">
                                <trix-editor input="tentang"></trix-editor>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <label class="form-label">Visi & Misi</label>
                                <input type="hidden" id="visi" name="visi" value="{{ $instansi->visi }}">
                                <trix-editor input="visi"></trix-editor>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Tugas & Wewenang</label>
                                <input type="hidden" id="tugas" name="tugas" value="{{ $instansi->tugas }}">
                                <trix-editor input="tugas"></trix-editor>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Update</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
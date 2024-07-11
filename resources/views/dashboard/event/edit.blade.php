@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Ubah Data</h5>
            </div>
            <div class="card-body">          
                <form method="post" action="{{ route('admin.event.update', $event->id) }}" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Judul Event</label>
                        <input type="text" class="form-control" name="judul" value="{{ $event->judul }}">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi Event</label>
                        <input type="hidden" id="deskripsi" name="deskripsi" value="{{ $event->deskripsi }}">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.event.index') }}">Batal</a>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
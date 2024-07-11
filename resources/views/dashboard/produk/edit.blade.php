@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Ubah Data</h5>
            </div>
            <div class="card-body">          
                <form method="post" action="{{ route('admin.produk.update', $produk->id_produk) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-1">
                        <input type="hidden" name="id_ukm" value="{{ $ukm->id_ukm }}">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('nm_prdk') is-invalid @enderror" name="nm_prdk" value="{{ $produk->nm_prdk }}">
                        @error('nm_prdk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Harga Produk</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $produk->harga }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Deskripsi Produk</label>
                        <input type="hidden" id="deskripsi" name="deskripsi" value="{{ $produk->deskripsi }}">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <div class="mb-1">
                        <input type="file" id="photo" class="form-control @error('photo') is-invalid @enderror" name="photo" onchange="previewImage()">
                        <input type="hidden" name="oldImage" value="{{ $produk->photo }}">
                        @if ($produk->photo)
                            <img class="img-preview img-fluid col-lg-8 mt-2" src="{{ asset('storage/'.$produk->photo) }}">
                        @else
                            <img class="img-preview img-fluid col-lg-8 mt-2">
                        @endif
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.produk.index') }}">Batal</a>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#photo');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
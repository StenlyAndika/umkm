@extends('layout.admin')

@section('container')
    <div class="card radius-10 full-height">
        <div class="card-header">
            <h5 class="mt-2">Data Produk</h5>
        </div>
        <div class="card-header mt-2 border-start border-0 border-4 border-danger">
            <h5 class="mt-2">Data Produk</h5>
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#tambahProduk">
                Data Baru
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: left;">Nama Produk</th>
                            <th style="text-align: left;">Harga</th>
                            <th style="text-align: left;">Photo</th>
                            <th style="text-align: center;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $row)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: left;">{{ $row->nm_prdk }}</td>
                            <td style="text-align: left;">{{ $row->harga }}</td>
                            <td style="text-align: left;"><img src="{{ asset('storage/'.$row->photo) }}" alt="" width="100"></td>
                            <td style="text-align: center;">
                                <a href="{{ route('admin.produk.edit', $row->id_produk) }}" class="btn btn-sm btn-primary">Ubah</a>
                                <form action="{{ route('admin.produk.destroy', $row->id_produk) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger hapusProduk">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hid_prdken="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('admin.produk.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <input type="hidden" name="id_ukm" value="{{ $ukm->id_ukm }}">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nm_prdk') is-invalid @enderror" name="nm_prdk" value="{{ old('nm_prdk') }}">
                            @error('nm_prdk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Harga Produk</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Deskripsi Produk</label>
                            <input type="hidden" id="deskripsi" name="deskripsi">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Photo Produk</label>
                            <input type="file" id="photo" class="form-control @error('photo') is-invalid @enderror" name="photo" onchange="previewImage()">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <img class="img-preview img-fluid col-lg-8 mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
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
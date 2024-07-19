<section class="page-section" id="kontakkami">
    <div class="container text-center text-md-start">
        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-md-8 mx-auto">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                    <a aria-label="home" href="/"><img src="/img/tablogo.webp" alt="" class="img-fluid" width="150px"></a>
                </h6>
                <p>
                    Website resmi umkm kota sungai penuh.<br>
                    Menyediakan seputar produk umkm dalam pemerintahan kota sungai penuh.
                </p>
            </div>
            <!-- Grid column -->


            <!-- Grid column -->
            <div class="col-md-4 mx-auto mb-md-0">
                <h4>Kontak Kami</h4>
                <form action="" method="post" id="kontakweb">
                    @csrf
                    <input type="text" class="form-control mb-1" name="nama" value="{{ old('nama') }}" placeholder="Nama Anda">
                    <input type="text" class="form-control mb-1" name="wa" value="{{ old('wa') }}" placeholder="Nomor Telp/WA">
                    <input type="text" class="form-control mb-1" name="email" value="{{ old('email') }}" placeholder="Email">
                    <textarea name="pesan" class="form-control mb-1" rows="4" aria-label="Pesan">
                        {{ old('pesan') }}
                    </textarea>
                    <button class="btn btn-md btn-primary fw-bold">Kirim Pesan</button>
                </form>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
</section>
<!-- Section: Links  -->
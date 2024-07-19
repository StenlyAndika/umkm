<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <a aria-label="home" href="/"><img src="/img/tablogo.webp" alt="" class="img-fluid" width="150px"></a>
                    <p>
                        Website Resmi UMKM Kota Sungai Penuh.<br>
                        Menyediakan seputar produk dalam pemerintahan kota sungai penuh.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><a href="http://sungaipenuhkota.go.id">Website Kota Sungai Penuh</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Tentang Kami</h4>
                    <p>
                        
                    </p>

                    <div class="social-links">
                        <a aria-label="mail" href="#" target="_blank" class="email"><i class="bi bi-envelope-fill"></i></a>
                        <a aria-label="facebook" href="#" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a aria-label="twitter" href="#"_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a aria-label="instagram" href="#" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter" id="kontakkami">
                    <h4>Kontak Kami</h4>
                    <form action="" method="post" id="kontakweb">
                        <input type="text" class="form-control mb-1" name="nama" value="{{ old('nama') }}" placeholder="Nama Anda">
                        <input type="text" class="form-control mb-1" name="wa" value="" placeholder="Nomor Telp/WA">
                        <input type="text" class="form-control mb-1" name="email" value="" placeholder="Email">
                        <textarea name="pesan" class="form-control mb-1" rows="4" aria-label="Pesan"></textarea>
                        <button class="btn btn-md btn-light text-danger fw-bold">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <a class="text-white" href="{{ route('login') }}">&copy;</a> Copyright <strong>Boy Kertajati</strong>. All Rights Reserved
        </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
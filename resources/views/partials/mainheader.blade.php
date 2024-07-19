<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <style>
            .stroke-single,
            .stroke-double {
                position: relative;
                background: transparent;
                z-index: 0;
                color: red;
                margin-left: 5px;
                font-family: "Mistral", sans-serif;
                font-weight: 500;
                color: #ff0000;
                font-size: 22px;
                position: relative;
                top: 8px;
            }
            /* add a single stroke */
            .stroke-single:before,
            .stroke-double:before {
                content: attr(title);
                position: absolute;
                -webkit-text-stroke: 0.11em #fff;
                left: 0;
                z-index: -1;
            }
            /* add a double stroke */
            .stroke-double:after {
                content: attr(title);
                position: absolute;
                -webkit-text-stroke: 0.25em #000;
                left: 0;
                z-index: -2;
            }
            .acidsb {
                font-family: "Arial Narrow", sans-serif;
                font-weight: bold;
                color: #00D4FF;
                font-size: 16px;
                font-style: italic;
                font-weight: bold;
                margin-left: 5px;
                position: relative;
                -webkit-text-stroke: 0.6px #080808 !important;
            }
        </style>
        <div class="navbar-brand">
            <table>
                <tr>
                    <td rowspan="2">
                        <a aria-label="home" href="{{ route('welcome') }}">
                            <div style="width: 45px"><img src="/img/tablogo.webp" alt="logo" class="img-fluid"></div>
                        </a>
                    </td>
                    <td>
                        <a aria-label="home" href="{{ route('welcome') }}">
                            <h3 class="stroke-double" title="UMKM Kota Sungai Penuh" style="text-align: left;">UMKM Kota Sungai Penuh</h3>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link" href="{{ route('welcome') }}">Beranda</a></li>
                <li><a class="nav-link" href="{{ route('produk') }}">Produk</a></li>
                <li class="dropdown"><a href="#">Profil <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('tentang') }}">Tentang UMKM</a></li>
                        <li><a href="{{ route('visi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('tugas') }}">Tugas dan Wewenang</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#kontakkami">Kontak Kami</a></li>
                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="wave" id="wave1" style="--i:1;"></div>
        <div class="wave" id="wave2" style="--i:2;"></div>
        <div class="wave" id="wave3" style="--i:3;"></div>
        <div class="wave" id="wave4" style="--i:4;"></div>
    </div>
</header>

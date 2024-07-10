@extends('layout.main')

@section('container')
<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class='bx bx-menu'></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/avatar.png" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('login') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Login</p>
                            </a>
                            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                            </form>                             --}}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <h5 class="card-title fw-semibold mb-4">Filter</h5>
            @foreach ($produk as $item)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('storage/'.$item->photo) }}" class="card-img-top img-fluid object-fit-fill" alt="..." style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nm_prdk }}</h5>
                            <p class="card-text">{!! $item->deskripsi !!}</p>
                            <a href="#" class="btn btn-primary">Lihat produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-danger fw-bold">Ukm Terdaftar</p>
                                <h4 class="my-1 text-primary">{{ $tukm }}</h4>
                            </div>
                            <div class="rounded-circle bg-primary text-white ms-auto">
                                <i class='bx bxs-user'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
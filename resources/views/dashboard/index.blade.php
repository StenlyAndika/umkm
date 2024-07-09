@extends('layout.admin')

@section('container')
    @php
        // $topd = App\Models\Opd::count();
        $tadmin = App\Models\User::where('is_root', '0')->count();
        $tsadmin = App\Models\User::where('is_root', '1')->count();
    @endphp
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Super Admin</p>
                            <h4 class="my-1 text-primary">{{ $tsadmin }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-primary text-white ms-auto">
                            <i class='bx bxs-user'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Admin OPD</p>
                            <h4 class="my-1 text-danger">{{ $tadmin }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-danger text-white ms-auto">
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Unit Kerja</p>
                            {{-- <h4 class="my-1 text-success">{{ $topd }}</h4> --}}
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto">
                            <i class='bx bx-buildings'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Pesan</p>
                            <h4 class="my-1 text-warning">0</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto">
                            <i class='bx bx-bell'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
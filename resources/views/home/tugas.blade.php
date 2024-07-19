@extends('layout.main')

@section('container')
<section class="col-md-12 mt-7 section mb-2">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p>{!! $instansi->tugas !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layout.admin')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-start border-0 border-4 border-danger">
                <h5 class="mt-2">Data User</h5>
                <a href="{{ route('daftaradmin') }}" class="btn btn-sm btn-success">Data Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $row)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ $row->username }}</td>
                                <td style="text-align: left;">
                                    @if ($row->is_super == 1)
                                        Super Admin
                                    @else
                                        Petugas UKM
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $row->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                    <form action="{{ route('admin.user.destroy', $row->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger hapusUser">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
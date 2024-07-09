@extends('layout.admin')

@section('container')
    <div class="card radius-10 full-height">
        <div class="card-header">
            <h5 class="mt-2">Data Pendaftaran Hari Ini</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: left;">No Antri</th>
                            <th style="text-align: left;">NIK</th>
                            <th style="text-align: left;">Poli</th>
                            <th style="text-align: left;">Status</th>
                            <th style="text-align: left;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran as $row)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: left;">{{ $row->no }}</td>
                            <td style="text-align: left;">{{ $row->nik }}</td>
                            <td style="text-align: left;">{{ $row->poli }}</td>
                            <td style="text-align: left;">
                                @if ($row->status == "0")
                                    Antri    
                                @elseif ($row->status == "1")
                                    Apotek
                                @else
                                    Selesai
                                @endif
                            </td>
                            <td>
                                <button type="submit" class="btn btn-block btn-sm btn-success">Diagnosa</button>
                                <button type="submit" class="btn btn-block btn-sm btn-danger">Cek Lab</button>
                                <button type="submit" class="btn btn-block btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#rujukIntern" data-id="{{ $row->id }}">Rujuk Internal</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rujukIntern" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rujuk Internal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateRujukIntern" method="post" action="" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <select class="select2-bootstrap4 form-control bg-light fs-6" data-dropdown-parent="#rujukIntern" id="poli" name="poli">
                                <option value="1" selected>-- Pilih Poli --</option>
                                @foreach ($poli as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control @error('noantrian') is-invalid @enderror" id="noantrian" name="noantrian" readonly>
                            <label for="noantrian">No Antrian</label>
                            @error('noantrian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
@endsection
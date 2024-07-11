<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        html{
			font-size: 10px;
		}
        .first-table {
            border-collapse: collapse;
            width: 100%;
        }
        .first-table th, .first-table tr, .first-table td {
            border: 0.5px solid;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center; font-size: 20px">DATA UMKM KOTA SUNGAI PENUH</h3>
    <h3 style="text-align: center; font-size: 20px">TAHUN {{ date('Y') }}</h3>
    <p>Kota         : Sungai Penuh</p>
    <p>Kecamatan    : Sungai Penuh</p>
    <p>Desa         : Sungai Penuh</p>
    <table class="first-table">
        <thead class="align-middle">
            <tr>
                <th style="text-align: center;">#</th>
                <th style="text-align: left;">Nama Pemilik</th>
                <th style="text-align: left;">NIK</th>
                <th style="text-align: left;">Nama Usaha</th>
                <th style="text-align: left;">No NPWP</th>
                <th style="text-align: left;">Bidang Usaha</th>
                <th style="text-align: left;">Sektor Usaha</th>
                <th style="text-align: left;">Alamat Usaha</th>
                <th style="text-align: left;">Aset</th>
                <th style="text-align: left;">Omset</th>
                <th style="text-align: left;">Klasifikasi</th>
                <th style="text-align: left;">Jumlah Tenaga Kerja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ukm as $row)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td style="text-align: left;">{{ $row->nama_pemilik }}</td>
                <td style="text-align: center;">{{ $row->nik }}</td>
                <td style="text-align: left;">{{ $row->nm_perusahaan }}</td>
                <td style="text-align: center;">{{ $row->no_npwp }}</td>
                <td style="text-align: center;">{{ $row->bidang_usaha }}</td>
                <td style="text-align: left;">{{ $row->sektor_usaha }}</td>
                <td style="text-align: left;">Desa {{ $row->almt_usaha }}</td>
                <td style="text-align: right;">{{ $row->aset }}</td>
                <td style="text-align: right;">{{ $row->omset }}</td>
                <td style="text-align: left;">{{ $row->kelas_usaha }}</td>
                <td style="text-align: center;">{{ $row->jml_tng_krj }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
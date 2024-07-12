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
    <p>Kecamatan    : {{ $filter }}</p>
    <p>Desa         : Sungai Penuh</p>
    <table class="first-table">
        <thead class="align-middle">
            <tr>
                <th style="text-align: center;" rowspan="2">#</th>
                <th style="text-align: left;" rowspan="2">Kelurahan/Desa</th>
                <th style="text-align: left;" colspan="4">UMKM</th>
                <th style="text-align: left;" rowspan="2">Aset</th>
                <th style="text-align: left;" rowspan="2">Omset</th>
                <th style="text-align: left;" rowspan="2">Tenaga Kerja</th>
            </tr>
            <tr>
                <th style="text-align: left;">Mikro</th>
                <th style="text-align: left;">Kecil</th>
                <th style="text-align: left;">Menengah</th>
                <th style="text-align: left;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ukm as $row)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="text-align: left;">{{ $row->almt_usaha }}</td>
                    <td style="text-align: left;">{{ $row->totalmikro }}</td>
                    <td style="text-align: left;">{{ $row->totalkecil }}</td>
                    <td style="text-align: left;">{{ $row->totalmenengah }}</td>
                    <td style="text-align: left;">{{ $row->totalmikro+$row->totalkecil+$row->totalmenengah }}</td>
                    <td style="text-align: left;">{{ $row->totalaset }}</td>
                    <td style="text-align: left;">{{ $row->totalomset }}</td>
                    <td style="text-align: left;">{{ $row->totaltngkrj }}</td>
                    
                </tr>
                @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Desa;
use App\Models\Event;
use App\Models\KelasUsaha;
use App\Models\BidangUsaha;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_admin == "1" && auth()->user()->is_super == "1") {
            return view('dashboard.index', [
                'title' => 'Dashboard Kepala Dinas',
                'tukm' => Ukm::join('user', 'user.nik', 'ukm.nik')
                            ->where('user.is_verified', '1')
                            ->count()
            ]);
        } else if(auth()->user()->is_admin == "1" && auth()->user()->is_super == "0") {
            return view('dashboard.index', [
                'title' => 'Dashboard Petugas',
                'tukm' => Ukm::join('user', 'user.nik', 'ukm.nik')
                            ->where('user.is_verified', '1')
                            ->count()
            ]);
        } else {
            return view('dashboard.home', [
                'title' => 'Dashboard',
                'event' => Event::orderBy('created_at', 'desc')->get(),
                'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
            ]);
        }
    }

    public function profilumkm() {
        return view('dashboard.profilumkm', [
            'title' => 'Dashboard Super Admin',
            'bidang_usaha' => BidangUsaha::all(),
            'desa' => Desa::all(),
            'kelas_usaha' => KelasUsaha::getall(),
            'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
        ]);
    }

    public function profilumkmupdate(Request $request) {

        $rulesukm = [
            'id_bdng_ush' => 'required',
            'kelas_usaha' => 'required',
            'deskripsi' => 'required',
            'no_npwp' => 'required',
            'sektor_usaha' => 'required',
            'almt_usaha' => 'required',
            'jml_tng_krj' => 'required',
            'aset' => 'required',
            'omset' => 'required',
            'no_telp' => 'required'
        ];

        $validatedDataUkm = $request->validate($rulesukm);

        Ukm::where('id_ukm', $request->id_ukm)->update($validatedDataUkm);

        return redirect()->route('admin.profilumkm')->with('toast_success', 'Berhasil diupdate!');
    }

    public function laporan(Request $request) {
        $filter = $request->input('id');
        $filter2 = $request->input('bidang_usaha');
        $query = Ukm::join('user', 'user.nik', '=', 'ukm.nik')
                    ->join('pemilik', 'pemilik.nik', '=', 'ukm.nik')
                    ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
                    ->join('desa', 'desa.id', '=', 'ukm.almt_usaha')
                    ->orderBy('user.is_verified', 'asc')
                    ->select(
                        'ukm.*', 
                        'user.id as user_id',
                        'user.is_verified',
                        'pemilik.nik as nik',
                        'desa.desa as almt_usaha',
                        'pemilik.nama as nama_pemilik', 
                        'bidang_usaha.nama as bidang_usaha',
                    );

        if ($filter && $filter != 0) {
            $query->where('desa.id', $filter);
            $query->where('bidang_usaha.nama', $filter2);
        }

        $ukm = $query->get();
        return view('dashboard.ukm.laporan', [
            'title' => 'Laporan Rekap Desa',
            'desa' => Desa::all(),
            'bidang_usaha' => BidangUsaha::all(),
            'ukm' => $ukm,
            'filter' => $filter,
            'filter2' => $filter2
        ]);
    }

    public function cetak_per_desa(Request $request)
    {
        $filter = $request->input('id');
        $filter2 = $request->input('bidang_usaha');
        $query = Ukm::join('user', 'user.nik', '=', 'ukm.nik')
                    ->join('pemilik', 'pemilik.nik', '=', 'ukm.nik')
                    ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
                    ->join('desa', 'desa.id', '=', 'ukm.almt_usaha')
                    ->orderBy('user.is_verified', 'asc')
                    ->select(
                        'ukm.*', 
                        'user.id as user_id',
                        'user.is_verified',
                        'pemilik.nik as nik',
                        'desa.desa as almt_usaha',
                        'pemilik.nama as nama_pemilik', 
                        'bidang_usaha.nama as bidang_usaha',
                    );

        if ($filter && $filter != 0) {
            $query->where('desa.id', $filter);
            $query->where('bidang_usaha.nama', $filter2);
        }

        $ukm = $query->get();

        $desa = Desa::where('id', $request->input('id'))->first();

        $pdf = PDF::loadView('dashboard.ukm.print', ['ukm' => $ukm, 'desa' => $desa]);
        $pdf->setPaper('F4', 'landscape');

        return $pdf->download('rekap-desa.pdf');
    }

    public function laporankecamatan(Request $request) {
        $filter = $request->input('id');

        $query = DB::table('ukm')
                    ->join('desa', 'desa.id', '=', 'ukm.almt_usaha')
                    ->select(
                        'ukm.*',
                        'desa.desa AS almt_usaha',
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Mikro' THEN ukm.id_ukm END) AS totalmikro"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Kecil' THEN ukm.id_ukm END) AS totalkecil"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Menengah' THEN ukm.id_ukm END) AS totalmenengah"),
                        DB::raw('sum(ukm.aset) as totalaset'),
                        DB::raw('sum(ukm.omset) as totalomset'),
                        DB::raw('sum(ukm.jml_tng_krj) as totaltngkrj')
                        )
                    ->where('desa.kecamatan', '=', $filter)
                    ->groupBy('ukm.almt_usaha');

        $ukm = $query->get();

        return view('dashboard.ukm.laporankecamatan', [
            'title' => 'Laporan Rekap Kecamatan',
            'ukm' => $ukm,
            'filter' => $filter
        ]);
    }

    public function cetak_per_kecamatan(Request $request)
    {
        $filter = $request->input('id');

        $query = DB::table('ukm')
                    ->join('desa', 'desa.id', '=', 'ukm.almt_usaha')
                    ->select(
                        'ukm.*',
                        'desa.desa AS almt_usaha',
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Mikro' THEN ukm.id_ukm END) AS totalmikro"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Kecil' THEN ukm.id_ukm END) AS totalkecil"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Menengah' THEN ukm.id_ukm END) AS totalmenengah"),
                        DB::raw('sum(ukm.aset) as totalaset'),
                        DB::raw('sum(ukm.omset) as totalomset'),
                        DB::raw('sum(ukm.jml_tng_krj) as totaltngkrj')
                        )
                    ->where('desa.kecamatan', '=', $filter)
                    ->groupBy('ukm.almt_usaha');

        $ukm = $query->get();

        $pdf = PDF::loadView('dashboard.ukm.printkecamatan', ['ukm' => $ukm, 'filter' => $filter]);
        $pdf->setPaper('F4', 'landscape');

        return $pdf->download('rekap-kecamatan.pdf');
    }

    public function laporankota() {
        $query = DB::table('ukm')
                    ->join('desa', 'desa.id', '=', 'ukm.almt_usaha')
                    ->select(
                        'desa.kecamatan AS almt_usaha',
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Mikro' THEN ukm.id_ukm END) AS totalmikro"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Kecil' THEN ukm.id_ukm END) AS totalkecil"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Menengah' THEN ukm.id_ukm END) AS totalmenengah"),
                        DB::raw('sum(ukm.aset) as totalaset'),
                        DB::raw('sum(ukm.omset) as totalomset'),
                        DB::raw('sum(ukm.jml_tng_krj) as totaltngkrj')
                        )
                    ->groupBy('desa.kecamatan');

        $ukm = $query->get();

        return view('dashboard.ukm.laporankota', [
            'title' => 'Laporan Rekap Kota',
            'ukm' => $ukm
        ]);
    }

    public function cetak_per_kota()
    {
        $query = DB::table('ukm')
                    ->join('desa', 'desa.id', '=', 'ukm.almt_usaha')
                    ->select(
                        'desa.kecamatan AS almt_usaha',
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Mikro' THEN ukm.id_ukm END) AS totalmikro"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Kecil' THEN ukm.id_ukm END) AS totalkecil"),
                        DB::raw("COUNT(CASE WHEN ukm.kelas_usaha = 'Menengah' THEN ukm.id_ukm END) AS totalmenengah"),
                        DB::raw('sum(ukm.aset) as totalaset'),
                        DB::raw('sum(ukm.omset) as totalomset'),
                        DB::raw('sum(ukm.jml_tng_krj) as totaltngkrj')
                        )
                    ->groupBy('desa.kecamatan');

        $ukm = $query->get();

        $pdf = PDF::loadView('dashboard.ukm.printkota', ['ukm' => $ukm]);
        $pdf->setPaper('F4', 'landscape');

        return $pdf->download('rekap-kota.pdf');
    }
}

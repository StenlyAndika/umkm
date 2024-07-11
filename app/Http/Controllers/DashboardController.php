<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\Ukm;
use App\Models\Desa;
use App\Models\Event;
use App\Models\Pasien;
use App\Models\KelasUsaha;
use App\Models\ActivityLog;
use App\Models\BidangUsaha;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_super == "1") {
            return view('dashboard.index', [
                'title' => 'Dashboard Super Admin',
                'tukm' => Ukm::join('user', 'user.nik', 'ukm.nik')
                            ->where('user.is_verified', '1')
                            ->count()
            ]);
        } else {
            return view('dashboard.home', [
                'title' => 'Dashboard Admin',
                'event' => Event::orderBy('created_at', 'desc')->get(),
                'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
            ]);
        }
    }

    public function profilumkm() {
        return view('dashboard.profilumkm', [
            'title' => 'Dashboard Super Admin',
            'bidang_usaha' => BidangUsaha::all(),
            'kelas_usaha' => KelasUsaha::all(),
            'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
        ]);
    }

    public function profilumkmupdate(Request $request) {

        $rulesukm = [
            'id_bdng_ush' => 'required',
            'id_kls_ush' => 'required',
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
        $query = Ukm::join('user', 'user.nik', '=', 'ukm.nik')
                    ->join('pemilik', 'pemilik.nik', '=', 'ukm.nik')
                    ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
                    ->join('kelas_usaha', 'kelas_usaha.id_kls_ush', '=', 'ukm.id_kls_ush')
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
                        'kelas_usaha.nama as kelas_usaha',
                    );

        if ($filter && $filter != 0) {
            $query->where('desa.id', $filter);
        }

        $ukm = $query->get();
        return view('dashboard.ukm.laporan', [
            'title' => 'Dashboard Admin',
            'desa' => Desa::all(),
            'ukm' => $ukm,
            'filter' => $filter
        ]);
    }

    public function cetak_per_desa(Request $request)
    {
        $filter = $request->input('id');
        $query = Ukm::join('user', 'user.nik', '=', 'ukm.nik')
                    ->join('pemilik', 'pemilik.nik', '=', 'ukm.nik')
                    ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
                    ->join('kelas_usaha', 'kelas_usaha.id_kls_ush', '=', 'ukm.id_kls_ush')
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
                        'kelas_usaha.nama as kelas_usaha',
                    );

        if ($filter && $filter != 0) {
            $query->where('desa.id', $filter);
        }

        $ukm = $query->get();

        $pdf = PDF::loadView('dashboard.ukm.print', ['ukm' => $ukm]);
        $pdf->setPaper('F4', 'landscape');

        return $pdf->download('laporan-per-desa.pdf');
    }

}

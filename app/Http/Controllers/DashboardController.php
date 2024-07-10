<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\Ukm;
use App\Models\Pasien;
use App\Models\KelasUsaha;
use App\Models\ActivityLog;
use App\Models\BidangUsaha;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_super == "1") {
            return view('dashboard.index', [
                'title' => 'Dashboard Super Admin'
            ]);
        } else {
            return view('dashboard.index', [
                'title' => 'Dashboard Admin',
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

}

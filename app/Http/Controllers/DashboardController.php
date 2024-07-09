<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\Pasien;
use App\Models\ActivityLog;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_root) {
            return view('dashboard.index', [
                'title' => 'Dashboard Admin',
            ]);
        } else {
            if (auth()->user()->poli == "PENDAFTARAN") {
                return view('dashboard.pendaftaran.index', [
                    'title' => 'Dashboard Pendaftaran',
                    'pendaftaran' => Pendaftaran::orderBy('tgl', 'desc')->get()
                ]);
            } else {
                $poli = [
                    "UMUM",
                    "GIGI",
                    "MTBS",
                    "KIA-KB",
                    "GIZI",
                    "P2M",
                    "PKPR"
                ];
                return view('dashboard.poli.index', [
                    'title' => 'Dashboard Poli',
                    'poli' => $poli,
                    'pendaftaran' => Pendaftaran::where('poli', auth()->user()->poli)
                        ->where('status', 'Antri')
                        ->orderBy('no', 'asc')
                        ->get()
                ]);
            }
            
        }
    }

}

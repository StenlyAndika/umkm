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
        return view('dashboard.index', [
            'title' => 'Dashboard Admin'
        ]);
    }

}

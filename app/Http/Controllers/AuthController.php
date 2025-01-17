<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ukm;
use App\Models\Desa;
use App\Models\User;
use App\Models\Pemilik;
use App\Models\KelasUsaha;
use App\Models\BidangUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => 'UMKM | Login'
        ]);
    }

    public function daftaradmin() {
        return view('auth.daftaradmin', [
            'title' => 'UMKM | Daftar Super Admin',
        ]);
    }

    public function regadmin(Request $request) {
        $rules = [
            'username' => 'required',
            'nik' => 'required',
            'password' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['is_admin'] = '1';
        $validatedData['is_super'] = '0';
        $validatedData['is_verified'] = '1';

        User::create($validatedData);

        return redirect()->route('admin.user.index')->with('toast_success', 'Admin didaftarkan!');
    }

    public function daftar() {
        $kecamatan = [
            'Sungai Penuh',
            'Pesisir Bukit',
            'Hamparan Rawang',
            'Tanah Kampung',
            'Kumun Debai',
            'Pondok Tinggi',
            'Koto Baru',
            'Sungai Bungkal'
        ];
        return view('auth.daftar', [
            'title' => 'UMKM | Daftar',
            'bidang_usaha' => BidangUsaha::all(),
            'kecamatan' => $kecamatan,
            'kelas_usaha' => KelasUsaha::getall()
        ]);
    }

    public function generateSuper() {
        $validatedSuperAdmin['nik'] = '0';
        $validatedSuperAdmin['username'] = 'admin';
        $validatedSuperAdmin['password'] = bcrypt('admin');
        $validatedSuperAdmin['is_admin'] = '1';
        $validatedSuperAdmin['is_super'] = '1';
        $validatedSuperAdmin['is_verified'] = '1';

        User::create($validatedSuperAdmin);
        return redirect()->route('login')->with('success', 'Super Admin didaftarkan!');
    }

    public function getdesa($kecamatan)
    {
        $desa = Desa::where('kecamatan', $kecamatan)->get();
        if ($desa) {
            return response()->json($desa);
        }
        return response()->json(['message' => 'Desa not found'], 404);
    }

    public function register(Request $request) {
        $rulesukm = [
            'nik' => 'required',
            'id_bdng_ush' => 'required',
            'kelas_usaha' => 'required',
            'nm_perusahaan' => 'required',
            'deskripsi' => 'required',
            'no_npwp' => 'required',
            'sektor_usaha' => 'required',
            'almt_usaha' => 'required',
            'jml_tng_krj' => 'required',
            'aset' => 'required|numeric',
            'omset' => 'required|numeric'
        ];
        
        $validatedDataUkm = $request->validate($rulesukm);

        Ukm::create($validatedDataUkm);

        $rulespemilik = [
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jekel' => 'required',
            'alamat' => 'required'
        ];
        
        $validatedDataPemilik = $request->validate($rulespemilik);

        Pemilik::create($validatedDataPemilik);

        $rules = [
            'username' => 'required',
            'nik' => 'required',
            'password' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['is_admin'] = '0';
        $validatedData['is_super'] = '0';
        $validatedData['is_verified'] = '0';

        User::create($validatedData);

        return redirect()->route('welcome')->with('toast_success', 'Berhasil mendaftar!');
    }

    public function authenticate(Request $request) {
        if($request->username == null) {
            return back()->with('loginError', 'Username tidak boleh kosong!');
        }

        if($request->password == null) {
            return back()->with('loginError', 'Password tidak boleh kosong!');
        }

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            if(auth()->user()->is_verified == "1") {
                $request->session()->regenerate();
                if(auth()->user()->is_super == '1') {
                    return redirect()->intended('/dashboard')->with('toast_success', 'Login Berhasil<br>Selamat Datang Kepala Dinas UMKM Kota Sungai Penuh');
                } else {
                    return redirect()->intended('/dashboard')->with('toast_success', 'Login Berhasil<br>Selamat Datang '.ucfirst(auth()->user()->username));
                }
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('welcome')->with('toast_error', 'Login gagal, UKM belum terdaftar atau diverifikasi');
            }
        }

        return back()->with('loginError', 'Login Gagal, Username atau Password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}

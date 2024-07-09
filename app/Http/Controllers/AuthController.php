<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ukm;
use App\Models\User;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => 'UMKM | Login'
        ]);
    }

    public function daftar() {
        $bidang_usaha = [
            "Dagang",
            "Jasa",
            "Industri"
        ];
        $kelas_usaha = [
            "Mikro",
            "Kecil",
            "Makro"
        ];
        $sektor_usaha = [
            "Menjual Cabe dan Bumbu Masak",
            "Bengkel Honda",
            "Usaha Barang Bekas"
        ];
        return view('auth.daftar', [
            'title' => 'UMKM | Daftar',
            'bidang_usaha' => $bidang_usaha,
            'kelas_usaha' => $kelas_usaha,
            'sektor_usaha' => $sektor_usaha
        ]);
    }

    public function register(Request $request) {
        // $rulesukm = [
        //     'nik' => 'required',
        //     'id_bdng_ush' => 'required',
        //     'id_kls_ush' => 'required',
        //     'nm_pemilik' => 'required',
        //     'nm_perusahaan' => 'required',
        //     'deskripsi' => 'required',
        //     'no_npwp' => 'required',
        //     'sektor_usaha' => 'required',
        //     'almt_usaha' => 'required',
        //     'jml_tng_krj' => 'required',
        //     'aset' => 'required',
        //     'omset' => 'required'
        // ];
        
        // $validatedDataUkm = $request->validate($rulesukm);

        // $validatedDataUkm['nik'] = $request->nik;
        // $validatedDataUkm['id_bdng_ush'] = $request->id_bdng_ush;
        // $validatedDataUkm['id_kls_ush'] = $request->id_kls_ush;
        // $validatedDataUkm['nm_pemilik'] = $request->nm_pemilik;
        // $validatedDataUkm['nm_perusahaan'] = $request->nm_perusahaan;
        // $validatedDataUkm['deskripsi'] = $request->deskripsi;
        // $validatedDataUkm['no_npwp'] = $request->no_npwp;
        // $validatedDataUkm['sektor_usaha'] = $request->sektor_usaha;
        // $validatedDataUkm['almt_usaha'] = $request->almt_usaha;
        // $validatedDataUkm['jml_tng_krj'] = $request->jml_tng_krj;
        // $validatedDataUkm['aset'] = $request->aset;
        // $validatedDataUkm['omset'] = $request->omset;
        // $validatedDataUkm['status'] = '0';

        // Ukm::create($validatedDataUkm);

        $rulespemilik = [
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'jabatan' => 'required'
        ];
        
        $validatedDataPemilik = $request->validate($rulespemilik);

        $validatedDataPemilik['nik'] = $request->nik;
        $validatedDataPemilik['nama'] = $request->nama;
        $validatedDataPemilik['tempat_lahir'] = $request->tempat_lahir;
        $validatedDataPemilik['tgl_lahir'] = $request->tgl_lahir;
        $validatedDataPemilik['jekel'] = $request->jekel;
        $validatedDataPemilik['alamat'] = $request->alamat;
        $validatedDataPemilik['umur'] = $request->umur;
        $validatedDataPemilik['jabatan'] = $request->jabatan;

        Pemilik::create($validatedDataPemilik);

        // $rules = [
        //     'username' => 'required',
        //     'nik' => 'required',
        //     'password' => 'required'
        // ];
        
        // $validatedData = $request->validate($rules);

        // $validatedData['nik'] = $request->nik;
        // $validatedData['username'] = $request->username;
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // User::create($validatedData);

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
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('toast_success', 'Login Berhasil<br>Selamat Datang '.ucfirst(auth()->user()->username));
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

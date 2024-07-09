<?php

namespace App\Http\Controllers;

// use App\Models\Pendaftaran;
use Carbon\Carbon;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardPendaftaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard.pendaftaran.index', [
        //     'title' => 'Data Pendaftaran',
        //     'pendaftaran' => Pendaftaran::orderBy('tgl', 'desc')->get()
        // ]);
    }

    public function caripasien(Request $request)
    {
        $search = $request->get('term');

        $pasien = Pasien::where('nama', 'LIKE', '%' . $search . '%')->get();

        $result = [];
        foreach ($pasien as $pas) {
            $result[] = ['value' => $pas->nama, 'idpas' => $pas->idpas];
        }

        return response()->json($result);
    }

    public function getpasien(Request $request, $idpas)
    {
        $pasien = Pasien::find($idpas);
        if ($pasien) {
            return response()->json($pasien);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    public function noantri($request)
    {
        $prefix = strtoupper(substr($request, 0, 2));
        $noantri = Pendaftaran::where('poli', 'LIKE', $prefix . '%')
            ->orderBy('no', 'desc')
            ->first();

        return response()->json(['noantrian' => $noantri->no ?? null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poli = [
            "UMUM",
            "GIGI",
            "MTBS",
            "KIA-KB",
            "GIZI",
            "P2M",
            "PKPR"
        ];

        return view('dashboard.pendaftaran.create', [
            'title' => 'Dashboard Admin',
            'poli' => $poli
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status == "Belum Terdaftar") {
            $rules = [
                'nama' => 'required',
                'tgl' => 'required',
                'bln' => 'required',
                'thn' => 'required',
                'namakk' => 'required',
                'nomr' => 'required',
                'nik' => 'required',
                'pekerjaan' => 'required',
                'jekel' => 'required',
                'alamat' => 'required',
                'nohp' => 'required',
                'noantrian' => 'required'
            ];
    
            $validatedData = $request->validate($rules);
    
            $validatedData['nama'] = strtoupper($request->nama);
    
            $tgl = sprintf('%04d-%02d-%02d', $request->thn, $request->bln, $request->tgl);
            $validatedData['tgl'] = $tgl;
            $validatedData['namakk'] = strtoupper($request->namakk);
            $validatedData['nomr'] = $request->nomr;
            $validatedData['nik'] = $request->nik;
            $validatedData['pekerjaan'] = $request->pekerjaan;
            $validatedData['jekel'] = $request->jekel;
            $validatedData['alamat'] = $request->alamat;
            $validatedData['nohp'] = $request->nohp;
    
            $dateOfBirth = Carbon::parse($tgl);
            $currentDate = Carbon::now();
            $umur = $dateOfBirth->diffInYears($currentDate);
            $validatedData['umur'] = $umur;
    
            Pasien::create($validatedData);

            $pendaftaranrules = [
                'noantrian' => 'required',
                'nik' => 'required',
                'poli' => 'required',
                'pembayaran' => 'required',
                'keterangan' => 'required'
            ];

            $validatedPendaftaran = $request->validate($pendaftaranrules);

            $validatedPendaftaran['no'] = $request->noantrian;
            $validatedPendaftaran['nik'] = $request->nik;
            $validatedPendaftaran['tgl'] = Carbon::now();
            $validatedPendaftaran['poli'] = strtoupper($request->poli);
            $validatedPendaftaran['pembayaran'] = strtoupper($request->pembayaran);
            $validatedPendaftaran['keterangan'] = $request->keterangan;
            $validatedPendaftaran['kunjungan'] = '1';

            Pendaftaran::create($validatedPendaftaran);
        } else {
            $pendaftaranrules = [
                'noantrian' => 'required',
                'nik' => 'required',
                'poli' => 'required',
                'pembayaran' => 'required',
                'keterangan' => 'required'
            ];

            $validatedPendaftaran = $request->validate($pendaftaranrules);

            $validatedPendaftaran['no'] = $request->noantrian;
            $validatedPendaftaran['nik'] = $request->nik;
            $validatedPendaftaran['tgl'] = Carbon::now();
            $validatedPendaftaran['poli'] = strtoupper($request->poli);
            $validatedPendaftaran['pembayaran'] = strtoupper($request->pembayaran);
            $validatedPendaftaran['keterangan'] = $request->keterangan;
            $validatedPendaftaran['kunjungan'] = '1';

            Pendaftaran::create($validatedPendaftaran);
        }

        return redirect()->route('admin.dashboard')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Pendaftaran $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaranrules = [
            'noantrian' => 'required',
            'poli' => 'required',
        ];

        $validatedPendaftaran = $request->validate($pendaftaranrules);

        $validatedPendaftaran['no'] = $request->noantrian;
        $validatedPendaftaran['poli'] = strtoupper($request->poli);

        unset($validatedPendaftaran['noantrian']); //to prevent saving noantrian to db

        Pendaftaran::where('id', $pendaftaran->id)->update($validatedPendaftaran);

        return redirect()->route('admin.dashboard')->with('toast_success', 'Pasien berhasil dirujuk!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran, Request $request)
    {
        //
    }
}

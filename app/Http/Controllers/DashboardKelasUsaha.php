<?php

namespace App\Http\Controllers;

use App\Models\KelasUsaha;
use Illuminate\Http\Request;

class DashboardKelasUsaha extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelas_usaha.index', [
            'title' => 'Kelas Usaha',
            'kelas_usaha' => KelasUsaha::orderBy('id_kls_ush', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['nama'] = ucwords($request->nama);

        KelasUsaha::create($validatedData);

        return redirect()->route('admin.kelas_usaha.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelasUsaha $kelas_usaha
     * @return \Illuminate\Http\Response
     */
    public function show(KelasUsaha $kelas_usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelasUsaha $kelas_usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(KelasUsaha $kelas_usaha)
    {
        return view('dashboard.kelas_usaha.edit', [
            'title' => 'Edit Data'
        ], compact('kelas_usaha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\KelasUsaha $kelas_usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelasUsaha $kelas_usaha)
    {
        $rules = [
            'nama' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['nama'] = ucwords($request->nama);

        KelasUsaha::where('id_kls_ush', $kelas_usaha->id_kls_ush)->update($validatedData);

        return redirect()->route('admin.kelas_usaha.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelasUsaha $kelas_usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelasUsaha $kelas_usaha, Request $request)
    {
        KelasUsaha::destroy($kelas_usaha->id_kls_ush);
        return redirect()->route('admin.kelas_usaha.index')->with('toast_success','Data berhasil dihapus!');
    }
}

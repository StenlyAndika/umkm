<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DashboardDesa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('dashboard.desa.index', [
            'title' => 'Desa',
            'kecamatan' => $kecamatan,
            'desa' => Desa::all()
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
            'desa' => 'required',
            'kecamatan' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Desa::create($validatedData);

        return redirect()->route('admin.desa.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {

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

        return view('dashboard.desa.edit', [
            'title' => 'Edit Data',
            'kecamatan' => $kecamatan
        ], compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Desa $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $rules = [
            'desa' => 'required',
            'kecamatan' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Desa::where('id', $desa->id)->update($validatedData);

        return redirect()->route('admin.desa.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa, Request $request)
    {
        Desa::destroy($desa->id);
        return redirect()->route('admin.desa.index')->with('toast_success','Data berhasil dihapus!');
    }
}

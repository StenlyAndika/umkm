<?php

namespace App\Http\Controllers;

use App\Models\BidangUsaha;
use Illuminate\Http\Request;

class DashboardBidangUsaha extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bidang_usaha.index', [
            'title' => 'Bidang Usaha',
            'bidang_usaha' => BidangUsaha::orderBy('id_bdng_ush', 'ASC')->get()
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

        BidangUsaha::create($validatedData);

        return redirect()->route('admin.bidang_usaha.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BidangUsaha $bidang_usaha
     * @return \Illuminate\Http\Response
     */
    public function show(BidangUsaha $bidang_usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BidangUsaha $bidang_usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(BidangUsaha $bidang_usaha)
    {
        return view('dashboard.bidang_usaha.edit', [
            'title' => 'Edit Data'
        ], compact('bidang_usaha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\BidangUsaha $bidang_usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BidangUsaha $bidang_usaha)
    {
        $rules = [
            'nama' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['nama'] = ucwords($request->nama);

        BidangUsaha::where('id_bdng_ush', $bidang_usaha->id_bdng_ush)->update($validatedData);

        return redirect()->route('admin.bidang_usaha.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BidangUsaha $bidang_usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(BidangUsaha $bidang_usaha, Request $request)
    {
        BidangUsaha::destroy($bidang_usaha->id_bdng_ush);
        return redirect()->route('admin.bidang_usaha.index')->with('toast_success','Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;

class DashboardUkm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ukm.index', [
            'title' => 'Dashboard Admin',
            'ukm' => Ukm::join('user', 'user.nik', '=', 'ukm.nik')
                        ->join('pemilik', 'pemilik.nik', '=', 'ukm.nik')
                        ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
                        ->join('kelas_usaha', 'kelas_usaha.id_kls_ush', '=', 'ukm.id_kls_ush')
                        ->orderBy('user.is_verified', 'asc')
                        ->select(
                            'ukm.*', 
                            'user.id as user_id',
                            'user.is_verified',
                            'pemilik.nama as nama_pemilik', 
                            'bidang_usaha.nama as bidang_usaha', 
                            'kelas_usaha.nama as kelas_usaha',
                        )
                        ->get()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

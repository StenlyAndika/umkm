<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\BidangUsaha;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $filter = $request->input('id_bdng_ush');
    
        $query = Produk::join('ukm', 'ukm.id_ukm', '=', 'produk.id_ukm')
            ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
            ->join('kelas_usaha', 'kelas_usaha.id_kls_ush', '=', 'ukm.id_kls_ush')
            ->select(
                'produk.*',
                'bidang_usaha.nama as bidang_usaha', 
                'kelas_usaha.nama as kelas_usaha'
            );

        if ($filter && $filter != 0) {
            $query->where('bidang_usaha.id_bdng_ush', $filter);
        }

        $produk = $query->paginate(12);

        return view('home.index', [
            'title' => 'UMKM Kota Sungai Penuh',
            'bidang_usaha' => BidangUsaha::all(),
            'produk' => $produk,
            'filter' => $filter
        ]);
    }

    public function detail($produk) {
        return view('home.detail', [
            'title' => 'Detail Produk',
            'produk' => Produk::join('ukm', 'ukm.id_ukm', 'produk.id_ukm')
                        ->join('bidang_usaha', 'bidang_usaha.id_bdng_ush', '=', 'ukm.id_bdng_ush')
                        ->select('produk.*',
                        'ukm.deskripsi as deskripsi_usaha',
                        'ukm.nm_perusahaan',
                        'ukm.no_telp',
                        'ukm.almt_usaha as alamat_usaha',
                        'bidang_usaha.nama as bidang_usaha')
                        ->where('id_produk', $produk)
                        ->first()
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

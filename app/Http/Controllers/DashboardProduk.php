<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardProduk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produk.index', [
            'title' => 'Produk',
            'produk' => Produk::all(),
            'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
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
        Log::info('Store Hit!');
        $rules = [
            'id_ukm' => 'required',
            'nm_prdk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'image|file'
        ];

        try {
            $validatedData = $request->validate($rules);
            Log::info('ValidatedData Hit!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::info('Validation failed', $e->errors());
            return redirect()->route('admin.produk.index')->withErrors($e->errors())->withInput();
        }

        Log::info('ValidatedData Hit!');

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('upload/photo');
            Log::info('Valitaded Photo Hit!');
        }

        try {
            Produk::create($validatedData);
            Log::info('Create Hit!');
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->route('admin.produk.index')->with('toast_error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('admin.produk.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', [
            'title' => 'Edit Data',
            'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
        ], compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        Log::info('Store Hit!');
        $rules = [
            'id_ukm' => 'required',
            'nm_prdk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'image|file'
        ];

        try {
            $validatedData = $request->validate($rules);
            Log::info('ValidatedData Hit!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::info('Validation failed', $e->errors());
            return redirect()->route('admin.produk.index')->withErrors($e->errors())->withInput();
        }

        Log::info('ValidatedData Hit!');

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('upload/photo');
            Log::info('Valitaded Photo Hit!');
        }

        try {
            Produk::where('id_produk', $produk->id_produk)->update($validatedData);
            Log::info('Create Hit!');
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->route('admin.produk.index')->with('toast_error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('admin.produk.index')->with('toast_success', 'Data berhasil ditambah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk, Request $request)
    {
        Produk::destroy($produk->id_produk);
        return redirect()->route('admin.produk.index')->with('toast_success','Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Http\Request;

class DashboardEvent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.event.index', [
            'title' => 'Event',
            'event' => Event::orderBy('created_at', 'ASC')->get()
        ]);
    }

    public function daftar($id)
    {
        return view('dashboard.event.daftar', [
            'title' => 'Event',
            'event' => Event::where('id', $id)->first(),
            'ukm' => Ukm::where('nik', auth()->user()->nik)->first()
        ]);
    }

    public function peserta()
    {
        return view('dashboard.event.peserta', [
            'title' => 'Event',
            'peserta' => Peserta::all()
        ]);
    }

    public function pesertaverif(Request $request)
    {
        $data = [
            'status' => '1',
        ];

        Peserta::where('id', $request->id)->update($data);

        $ev = Peserta::where('id', $request->id)->first();
        $ckuota = Event::where('id', $ev->ide)->first();
        $kuota = $ckuota->kuota - 1;
        $validatedDataEvent['kuota'] = $kuota;
        Event::where('id', $ev->ide)->update($validatedDataEvent);

        return redirect()->route('admin.event.index')->with('toast_success', 'UKM Berhasil Diverifikasi!');
    }

    public function pesertatolak(Request $request)
    {
        $data = [
            'status' => '2',
        ];
    
        Peserta::where('id', $request->id)->update($data);

        return redirect()->route('admin.event.index')->with('toast_success', 'UKM Berhasil Ditolak!');
    }

    public function daftarevent(Request $request)
    {
        $rules = [
            'ide' => 'required',
            'id_ukm' => 'required'
        ];

        $validatedData = $request->validate($rules);
        Peserta::create($validatedData);

        return redirect()->route('admin.dashboard')->with('toast_success', 'Data berhasil diupdate!');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl' => 'required',
            'kuota' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Event::create($validatedData);

        return redirect()->route('admin.event.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('dashboard.event.edit', [
            'title' => 'Edit Data'
        ], compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl' => 'required',
            'kuota' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Event::where('id', $event->id)->update($validatedData);

        return redirect()->route('admin.event.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Request $request)
    {
        Event::destroy($event->id);
        return redirect()->route('admin.event.index')->with('toast_success','Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Data User',
            'user' => User::where('is_super', '0')->get()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->id != auth()->user()->id) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('dashboard.user.profil', [
                'title' => 'Profil Admin'
            ], compact('user'));
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User'
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'password' => 'required'
        ];

        if ($request->username != auth()->user()->username) {
            $rules['username'] = 'required|unique:user';
        }

        $validatedData = $request->validate($rules);

        if($validatedData['password'] != auth()->user()->password) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        
        User::where('id', $user->id)->update($validatedData);
        if($user->is_super) {
            return redirect()->route('admin.user.index')->with('toast_success', 'Data berhasil diupdate!');
        } else {
            return redirect()->route('admin.dashboard')->with('toast_success', 'Data berhasil diupdate!');
        }
    }

    public function updateverif(Request $request, User $user)
    {
        $data = [
            'is_verified' => '1',
        ];
    
        User::where('id', $user->id)->update($data);

        return redirect()->route('admin.ukm.index')->with('toast_success', 'UKM Berhasil Diverifikasi!');
    }

    public function updatereject(Request $request, User $user)
    {
        $data = [
            'is_verified' => '2',
        ];
    
        User::where('id', $user->id)->update($data);

        return redirect()->route('admin.ukm.index')->with('toast_success', 'UKM Berhasil Diverifikasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        User::destroy($user->id);
        if(auth()->user()->username == $user->username) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home')->with('success','Data berhasil dihapus!');
        } else {
            return redirect()->route('admin.user.index')->with('toast_success','Data berhasil dihapus!');
        }
    }
}

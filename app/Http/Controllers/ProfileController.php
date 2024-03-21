<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan Profile
        $breadcumb = "Profile";

        $pelanggan = Pelanggan::where('id_user', Auth::user()->id)->first();
        return view('profile.index', compact('breadcumb'), ['pelanggan' => $pelanggan]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Menyimpan data edit profile
        $request->validate([
        'namaLengkap' => 'required|unique:pelanggan,namaLengkap,'.$id,
        'nomor_hp' => 'required',
        'alamat' => 'required',
        'foto' => $request->file('foto') != null ?'image|file|max:2048' : '',
        'id_user' => 'required'
        ]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->namaLengkap = $request->namaLengkap;
        $pelanggan->nomor_hp = $request->nomor_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->id_user = $request->id_user;
        // $pelanggan->foto = $request->file('foto')->store('Foto Pelanggan');
        
        if($request->file('foto') != null){
            // unlink("storage/" . $pelanggan->foto);
            $pelanggan->foto = $request->file('foto')->store('Foto Pelanggan');
            }
            $pelanggan->save();
            return redirect()->route('profile.index')->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

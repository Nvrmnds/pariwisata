<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan Data Pelanggan
        $breadcumb = "Data Pelanggan";

        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('breadcumb', 'pelanggans'), [
            'pelanggan' => $pelanggans
        ]);
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
    public function edit($id)
    {
        //Menampilkan Form Edit Profile
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return redirect()->route('pelanggan.index')->with('error_message', 'Data Pelanggan dengan id = ' . $id . ' tidak ditemukan');
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'users' => User::all() //Mengirimkan semua data user ke Modal pada halaman edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Menyimpan data edit pelanggan
        $pelanggan = Pelanggan::find($id);
        $pelanggan->namaLengkap = $request->namaLengkap;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->nomor_hp = $request->nomor_hp;
        $pelanggan->foto = $request->file('foto')->store('Foto Pelanggan');
        $pelanggan->id_user = $request->id_user;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

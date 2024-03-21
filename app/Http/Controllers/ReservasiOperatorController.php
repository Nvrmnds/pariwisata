<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use App\Models\DaftarPaket;
use app\Models\User;

class ReservasiOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Reservasi Pelanggan
        $breadcumb = "List Reservasi Pelanggan";

        $reservasi = Reservasi::all();
        if (!$reservasi) return redirect()->route('reservasiOperator.index')->with('error', 'Data reservasi dengan id = ' . $id . ' tidak ditemukan');
        return view('reservasiOperator.index', compact('breadcumb'), [
            'reservasi' => $reservasi
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
    public function edit(string $id)
    {
        //Menampilkan Form Edit
        $reservasi = Reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasiOperator.index')->with('error', 'Data reservasi dengan id = ' . $id . ' tidak ditemukan');
        return view('reservasiOperator.edit', [
            'reservasi' => $reservasi,
            'users' => User::all(),
            'daftarPaket' => DaftarPaket::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Menyimpan data Reservsai Pelanggan yang telah diubah
        $reservasi = Reservasi::find($id);
        $reservasi->statusReservasiWisata = $request->statusReservasiWisata;
        $reservasi->save();
        return redirect()->route('reservasiOperator.index')->with('success', 'Status telah di ubah'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

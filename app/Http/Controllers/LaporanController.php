<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\DaftarPaket;
use App\Models\Pelanggan;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan List Laporan Reservasi
        $breadcumb = "List Laporan Reservasi";

        $reservasi = Reservasi::all();
        return view('laporan.index', compact('breadcumb', 'reservasi'), [
        'reservasi' => $reservasi
        ]);
    }

    public function search(Request $request) { 
        if ($request->start && $request->end && $request->status) 
        { $data = Reservasi::whereBetween('tglReservasiWisata', [$request->start, $request->end])
             ->where('statusReservasiWisata', $request->status)->get(); 
        } elseif ($request->start && $request->end){ 
            $data = Reservasi::whereBetween('tglReservasiWisata', [$request->start, $request->end])->get(); 
        } elseif ($request->status) { $data = Reservasi::where('statusReservasiWisata', $request->status)->get(); 
        } 
        else { $data = Reservasi::get(); } return view('laporan.index', [ 'reservasi' => $data ]); 
    }

    public function exportpdf(){
        $exportpdf = Reservasi::all();

        return view('laporan.create', compact('exportpdf'), [
            'reservasi' => $exportpdf
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

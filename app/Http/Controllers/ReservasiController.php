<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\DaftarPaket;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan List Reservasi
        $breadcumb = "List Reservasi";
        
        $reservasi = Reservasi::when(request('search'), function($query){
            return $query->where('idDaftarPaket','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')->get();

        if (Auth::user()->pelanggan) {
            $data = Reservasi::where('idPelanggan', Auth::user()->pelanggan->id)->get();
        } else {
            $data = Reservasi::get();
        }
        return view('reservasi.index', compact('breadcumb', 'reservasi'), [
            'data' => $data,
            'daftarPaket' => DaftarPaket::get(),
            'pelanggan' => Pelanggan::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Menampilkan Form Tambah Reservasi
        $breadcumb = "Form Tambah Reservasi";

        return view(
            'reservasi.create', compact('breadcumb'),
            [
                'pelanggan' => Pelanggan::all(),
                'daftarPaket' => DaftarPaket::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menyimpan Data 
        $request->validate([
            'idPelanggan' =>'required',
            'idDaftarPaket'=> 'required',
            'tglReservasiWisata'=> 'required',
            'harga' => 'required',
            'jumlah_peserta'=> 'required',
            'diskon'=> 'required',
            'nilaiDiskon'=> 'required',
            'totalBayar'=> 'required',
            'statusReservasiWisata'=> 'pesan',
        ]);

            $array = $request->only([
            'idPelanggan', 'idDaftarPaket', 'tglReservasiWisata', 'harga', 'jumlah_peserta', 'diskon', 'nilaiDiskon', 'totalBayar', 'statusReservasiWisata'
        ]);
            $tambah = Reservasi::create($array);
            return redirect()->route('reservasi.index')->with('success', 'Terimakasih telah melakukan reservasi ');
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
        //Menyimpan data Bukti Pembayaran
        $reservasi = Reservasi::find($id);
        $reservasi->fileBuktiTf = $request->file('fileBuktiTf')->store('File Bukti Transaksi');
        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success', 'Pembayaran Mu Telah Diperoses Silahkan Tunggu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

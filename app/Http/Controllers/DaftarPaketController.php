<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;

class DaftarPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan List Daftar Paket
        $breadcumb = "List Daftar Paket";
        
        $daftarPakets = DaftarPaket::when(request('search'), function($query){
            return $query->where('nama_paket','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')->get();

        // dd($karyawans);
        
        return view('daftarPaket.index', compact('breadcumb', 'daftarPakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Menampilkan Form Tambah Daftar Paket
        $breadcumb = "Form Tambah Daftar Paket";

        return view( 
            'daftarPaket.create', compact('breadcumb'), [ 
            'paketWisatas' => PaketWisata::all() //Mengirimkan semua data Paket Wisata ke Modal pada halaman create
                ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menyimpan Data Daftar Paket Baru
        // dd($request->all());

        $this->validate($request, [
            'nama_paket' => 'required|unique:daftar_paket,nama_paket', 
            'idPaketWisata'=> 'required',
            'jumlahPeserta'=> 'required',
            'hargaPaket'=> 'required'
        ]);

        // DB::beginTransaction();

        try{

            DaftarPaket::create([
                'nama_paket' => $request->nama_paket,
                'idPaketWisata' => $request->idPaketWisata,
                'jumlahPeserta' => $request->jumlahPeserta,
                'hargaPaket' => $request->hargaPaket
            ]);

            // DB::commit();
            return redirect()->route('daftarPaket.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            // DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
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
    public function edit($id, DaftarPaket $daftarPaket)
    {
        // Menampilkan Form edit Daftar Paket
        $breadcumb = "Edit data Daftar Paket";
        $daftarPaket = $daftarPaket->find($id);

        return view( 
            'daftarPaket.edit', compact('breadcumb', 'daftarPaket'), [ 
            'paketWisatas' => PaketWisata::all() //Mengirimkan semua data User ke Modal pada halaman edit
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarPaket $daftarPakets)
    {
        // Menyimpan data edit Daftar Paket
        // dd($request->all());

        $this->validate($request, [
            'nama_paket' => 'required',
            'jumlahPeserta'=> 'required',
            'hargaPaket'=> 'required'
        ]);

        // DB::beginTransaction();

        try{

            $data = [
                'nama_paket' => $request->nama_paket,
                'jumlahPeserta' => $request->jumlahPeserta,
                'hargaPaket' => $request->hargaPaket,
            ];

            $daftarPakets->find($request->id)->update($data);

            // DB::commit();   
            return redirect()->route('daftarPaket.index')->with('success','Data berhasil diubah');

        } catch(\Exeception $e) {

            // DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('error','Data gagal disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DaftarPaket $daftarPakets)
    {
        // Menghapus data Daftar Paket
        // DB::beginTransaction();

        try{
            $daftarPakets->find($id)->delete();     

            // DB::commit();
            return redirect()->route('daftarPaket.index')->with('success','Data Daftar Paket berhasil dihapus');                             
        }
        catch(\Exeception $e){
            // DB::rollback();      
            return redirect()->route('daftarPaket.index')->with('error',$e);      
        }
    }
}

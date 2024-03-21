<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data Paket Wisata
        $breadcumb = "List Paket Wisata";

        $paketWisatas = PaketWisata::all();
        return view('paketWisata.index', compact('breadcumb', 'paketWisatas'), [
        'paketWisatas' => $paketWisatas
        ]);
    }
    public function create()
    {
        //Menampilkan Form Tambah Paket Wisata
        $breadcumb = "Form tambah Paket Wisata";

        return view('paketwisata.create', compact('breadcumb'));
    }
    public function store(Request $request)
    {
        //Menyimpan Data Paket Wisata
        $request->validate([
            'namaPaket' =>'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'required|image|file|max:2048',
            'foto2' => 'required|image|file|max:2048',
            'foto3' => 'required|image|file|max:2048',
            'foto4' => 'required|image|file|max:2048',
            'foto5' => 'required|image|file|max:2048',
            ]);
            $array = $request->only([
            'namaPaket', 'deskripsi', 'fasilitas', 'itinerary', 'diskon', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5' 
            ]);
            $array['foto1'] = $request->file('foto1')->store('Foto Paket Wisata');
            $array['foto2'] = $request->file('foto2')->store('Foto Paket Wisata');
            $array['foto3'] = $request->file('foto3')->store('Foto Paket Wisata');
            $array['foto4'] = $request->file('foto4')->store('Foto Paket Wisata');
            $array['foto5'] = $request->file('foto5')->store('Foto Paket Wisata');
            $tambah=PaketWisata::create($array);
            if($tambah) $request->file('foto1')->store('Foto Paket Wisata');
            return redirect()->route('paketWisata.index')->with('success', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto2')->store('Foto Paket Wisata');
            return redirect()->route('paketWisata.index')->with('success', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto3')->store('Foto Paket Wisata');
            return redirect()->route('paketWisata.index')->with('success', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto4')->store('Foto Paket Wisata');
            return redirect()->route('paketWisata.index')->with('success', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto5')->store('Foto Paket Wisata');
            return redirect()->route('paketWisata.index')->with('success', 'Berhasil menambah data paket wisata baru');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit Paket Wisata
        $breadcumb = "Form edit Paket Wisata";
        $paketWisata = PaketWisata::find($id);
        if (!$paketWisata)
            return redirect()->route('paketWisata.index')->with('error_message', 'Paket Wisata dengan id' . $id . ' tidak ditemukan');
        return view('paketWisata.edit', compact('breadcumb', 'paketWisata'), [
            'paketWisata' => $paketWisata
        ]);
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
        //Meyimpan Data Edit Paket Wisata
        $request->validate([
            'namaPaket' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'deskripsi' => 'required',
            'foto1' => $request->file('foto1') != null ? 'image|file|max:2048' : '',
            'foto2' => $request->file('foto2') != null ? 'image|file|max:2048' : '',
            'foto3' => $request->file('foto3') != null ? 'image|file|max:2048' : '',
            'foto4' => $request->file('foto4') != null ? 'image|file|max:2048' : '',
            'foto5' => $request->file('foto5') != null ? 'image|file|max:2048' : ''
        ]);
        $paketWisata = PaketWisata::find($id);
        $paketWisata->namaPaket = $request->namaPaket;
        $paketWisata->deskripsi = $request->deskripsi;
        $paketWisata->fasilitas = $request->fasilitas;
        $paketWisata->itinerary = $request->itinerary;
        $paketWisata->diskon = $request->diskon;
        if($request->file('foto1') != null){
            unlink("storage/" . $paketWisata->foto1);
            $paketWisata->foto1 = $request->file('foto1')->store('Foto Paket Wisata');
            }
        $paketWisata->save();
        return redirect()->route('paketWisata.index')->with('success', 'Berhasil mengubah data Paket Wisata');

        if($request->file('foto2') != null){
            unlink("storage/" . $paketWisata->foto2);
            $paketWisata->foto2 = $request->file('foto2')->store('Foto Paket Wisata');
            }
        $paketWisata->save();
        return redirect()->route('paketWisata.index')->with('success', 'Berhasil mengubah data Paket Wisata');

        if($request->file('foto3') != null){
            unlink("storage/" . $paketWisata->foto3);
            $paketWisata->foto3 = $request->file('foto3')->store('Foto Paket Wisata');
            }
        $paketWisata->save();
        return redirect()->route('paketWisata.index')->with('success', 'Berhasil mengubah data Paket Wisata');

        if($request->file('foto4') != null){
            unlink("storage/" . $paketWisata->foto4);
            $paketWisata->foto4 = $request->file('foto4')->store('Foto Paket Wisata');
            }
        $paketWisata->save();
        return redirect()->route('paketWisata.index')->with('success', 'Berhasil mengubah data Paket Wisata');

        if($request->file('foto5') != null){
            unlink("storage/" . $paketWisata->foto5);
            $paketWisata->foto5 = $request->file('foto5')->store('Foto Paket Wisata');
            }
        $paketWisata->save();
        return redirect()->route('paketWisata.index')->with('success', 'Berhasil mengubah data Paket Wisata');
    }

    public function destroy(Request $request, $id)
    {
        //Menghapus Paket Wisata
        $paketWisata = PaketWisata::find($id);
        if ($paketWisata) {
            $hapus = $paketWisata->delete();
            if ($hapus)
                unlink("storage/" . $paketWisata->foto1);
                unlink("storage/" . $paketWisata->foto2);
                unlink("storage/" . $paketWisata->foto3);
                unlink("storage/" . $paketWisata->foto4);
                unlink("storage/" . $paketWisata->foto5);
        }

        return redirect()->route('paketWisata.index')->with('success','Data Paket Wisata berhasil dihapus');
    }


}
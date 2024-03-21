<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan List Karyawan
        $breadcumb = "List Karyawan";
        
        $karyawans = Karyawan::when(request('search'), function($query){
            return $query->where('namaKaryawan','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')->get();

        // dd($karyawans);
        
        return view('karyawan.index', compact('breadcumb', 'karyawans'), [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Menampilkan Form Tambah Karyawan
        $breadcumb = "Form Tambah Karyawan";

        return view( 
            'karyawan.create', compact('breadcumb'), [ 
            'users' => User::all() //Mengirimkan semua data User ke Modal pada halaman create
                ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menyimpan Data Karyawan Baru
        // dd($request->all());

        $this->validate($request, [
            'namaKaryawan' => 'required|unique:karyawan,namaKaryawan', 
            'alamat'=> 'required',
            'nomorHp'=> 'required',
            'jabatan'=> 'required',
            'id_user'=> 'required'
        ]);

        // DB::beginTransaction();

        try{

            Karyawan::create([
                'namaKaryawan' => $request->namaKaryawan,
                'alamat' => $request->alamat,
                'nomorHp' => $request->nomorHp,
                'jabatan' => $request->jabatan,
                'id_user' => $request->id_user
            ]);

            // DB::commit();
            return redirect()->route('karyawan.index')->with('success','Data berhasil disimpan');

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
    public function edit($id, Karyawan $karyawan)
    {
        // Menampilkan Form edit Kayawan
        $breadcumb = "Edit data Karyawan";
        $karyawan = $karyawan->find($id);

        return view( 
            'karyawan.edit', compact('breadcumb', 'karyawan'), [ 
            'users' => User::all() //Mengirimkan semua data User ke Modal pada halaman edit
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawans)
    {
        // Menyimpan data edit Karyawan
        // dd($request->all());

        $this->validate($request, [
            'namaKaryawan' => 'required', 
            'alamat'=> 'required',
            'nomorHp'=> 'required',
            'jabatan'=> 'required'
        ]);

        // DB::beginTransaction();

        try{

            $data = [
                'namaKaryawan' => $request->namaKaryawan,
                'alamat' => $request->alamat,
                'nomorHp' => $request->nomorHp,
                'jabatan' => $request->jabatan,
            ];

            $karyawans->find($request->id)->update($data);

            // DB::commit();   
            return redirect()->route('karyawan.index')->with('success','Data berhasil diubah');

        } catch(\Exeception $e) {

            // DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('error','Data gagal disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Karyawan $karyawans)
    {
        // Menghapus data Karyawan
        // DB::beginTransaction();

        try{
            $karyawans->find($id)->delete();     

            // DB::commit();
            return redirect()->route('karyawan.index')->with('success','Data Karyawan berhasil dihapus');                             
        }
        catch(\Exeception $e){
            // DB::rollback();      
            return redirect()->route('karyawan.index')->with('error',$e);      
        }
    }
}

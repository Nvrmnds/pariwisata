<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = [
        'idPelanggan',
        'idDaftarPaket',
        'tglReservasiWisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilaiDiskon',
        'totalBayar',
        'fileBuktiTf',
        'statusReservasiWisata'
    ];

    public function daftarPaket(){
        return $this->belongsTo(DaftarPaket::class,'idDaftarPaket', 'id', 'nama_paket');
    }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'idPelanggan', 'id', 'namaLengkap');
    }
}

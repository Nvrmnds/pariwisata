<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;

    protected $table = 'daftar_paket'; 
    protected $fillable = [ 
    'nama_paket', 
    'idPaketWisata',
    'jumlahPeserta', 
    'hargaPaket',
    ];

    public function paketWisata(){
        return $this->belongsTo(PaketWisata::class, 'idPaketWisata', 'id');
        }
}

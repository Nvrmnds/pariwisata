<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;
    protected $table = 'paket_wisata'; 
    protected $fillable = [
        'namaPaket',
        'fasilitas',
        'itinerary',
        'diskon',
        'deskripsi',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5'
    ];
}

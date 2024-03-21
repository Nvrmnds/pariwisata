<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'Karyawan'; 
    protected $fillable = [ 
    'namaKaryawan', 
    'alamat',
    'nomorHp', 
    'jabatan',
    'id_user',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
        }
}

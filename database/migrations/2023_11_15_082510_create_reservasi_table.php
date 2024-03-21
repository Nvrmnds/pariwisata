<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPelanggan')->default(true);
            $table->foreign('idPelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDaftarPaket')->default(true);
            $table->foreign('idDaftarPaket')->references('id')->on('daftar_paket')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('tglReservasiWisata');
            $table->integer('harga');
            $table->integer('jumlah_peserta');
            $table->decimal('diskon', 10,0);
            $table->float('nilaiDiskon');
            $table->BigInteger('totalBayar');
            $table->text('fileBuktiTf')->nullable();
            $table->enum('statusReservasiWisata', ['Pesan', 'Dibayar', 'Selesai'])->default('Pesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi_pelanggan');
    }
};

@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error',[ 'message'=> $error ])
            @endforeach
        @endif
        
        <form action="{{ route('daftarPaket.update', $daftarPaket) }}" method="POST" id="kt_create_pengeluaran">
            @csrf
            <input type="hidden" name="id" value="{{ $daftarPaket->id }}">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="nama_paket">Nama Paket</label>
                                        <input type="text" class="form-control form-control-solid" name="nama_paket" value="{{ old('nama_paket', $daftarPaket->nama_paket) }}">
                                        @include('layouts.error', ['name' => 'nama_paket'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="idPaketWisata">ID Paket Wisata</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-solid" type="hidden" name="idPaketWisata" id="idPaketWisata"
                                                value="{{$daftarPaket->daftarPaket->id ?? old('idPaketWisata')}}">
                                            <input class="form-control form-control-solid" type="text" class="form-control @error('namaPaket') is-invalid @enderror" id="namaPaket"
                                                name="namaPaket" value="{{$daftarPaket->paketWisata->namaPaket ?? old('namaPaket')}}"
                                                aria-label="ID User" aria-describedby="cari" readonly>
                                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                                data-bs-target="#staticBackdrop"></i>
                                                Cari Data Paket Wisata
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="jumlahPeserta">Jumlah Peserta</label>
                                        <input type="text" class="form-control form-control-solid" name="jumlahPeserta" value="{{ old('jumlahPeserta', $daftarPaket->jumlahPeserta) }}">
                                        @include('layouts.error', ['name' => 'jumlahPeserta'])
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="hargaPaket">Harga Paket</label>
                                        <input type="text" class="form-control form-control-solid" name="hargaPaket" value="{{ old('hargaPaket', $daftarPaket->hargaPaket) }}">
                                        @include('layouts.error', ['name' => 'hargaPaket'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex d-flex justify-content-end">
                            <a href="{{ route('daftarPaket.index') }}" class="btn btn-light me-5">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
    
    @section('onpage-js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $('#example2').DataTable({
        "responsive": true,
    });
    
    function pilih(id, email) {
        document.getElementById('id_user').value = id
        document.getElementById('email').value = email
    }
    </script>

    @if(Session::has('errorTransaksi'))
    <script>
        toastr.error(
            'Data tidak valid'
        )

    </script>
    @endif

    @if(Session::has('success'))
    <script>
        toastr.success(
            'Data berhasil di perbarui'
        )

    </script>
    @endif
    @endsection

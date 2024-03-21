@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error',[ 'message'=> $error ])
            @endforeach
        @endif
        
        <form action="{{ route('reservasiOperator.update', $reservasi) }}" method="POST" id="kt_create_pengeluaran">
        @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $reservasi->id }}">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="statusReservasiWisata">Status Reservasi</label>
                                        <select class="form-control form-select form-select-solid @error('statusReservasiWisata') isinvalid @enderror" id="statusReservasiWisata"
                                            name="statusReservasiWisata" aria-label="Pilih" data-control="select2" data-placeholder="Pilih Status...">
                                            <option value="">Pilih Status...</option>
                                            <option value="pesan" @if($reservasi->statusReservasiWisata == 'pesan' ||
                                                old('statusReservasiWisata') == 'pesan')selected @endif>Pesan</option>
                                            <option value="dibayar" @if($reservasi->statusReservasiWisata == 'dibayar' ||
                                                old('statusReservasiWisata') == 'dibayar')selected @endif>Dibayar</option>
                                            <option value="selesai" @if($reservasi->statusReservasiWisata == 'selesai' ||
                                                old('statusReservasiWisata') == 'selesai')selected @endif>Selesai</option>
                                        </select>
                                        @error('statusReservasiWisata')
                                            <span class="textdanger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex d-flex justify-content-end">
                            <a href="{{ route('reservasiOperator.index') }}" typ3="button" class="btn btn-light me-5">
                                Batal
                            </a>
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
            'Data berhasil di perbaharui'
        )

    </script>
    @endif
    @endsection

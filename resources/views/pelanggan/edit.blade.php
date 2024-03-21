@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error',[ 'message'=> $error ])
            @endforeach
        @endif
        
        <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST" id="kt_create_pengeluaran">
            @method('PUT')
            @csrf
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="foto" class="form-label">Foto</label>
                                            @if($pelanggan->foto)
                                            <img src="{{ asset('storage/'. $pelanggan->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                                            @else
                                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                            @endif
                                            <input class="form-control @error('foto') is-invalid @enderror" type="file"  id="foto" name="foto" value="{{$pelanggan->foto ?? old('foto')}}" onchange="previewImage()">
                                            @error('foto') <span class="textdanger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="namaLengkap">Nama</label>
                                        <input type="text" class="form-control form-control-solid" name="namaLengkap" value="{{ old('namaLengkap', $pelanggan->namaLengkap) }}" min="0">
                                        @include('layouts.error', ['name' => 'namaLengkap'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="nomor_hp">Nomor Handphone</label>
                                        <input type="number" class="form-control form-control-solid" name="nomor_hp" value="{{ old('nomor_hp', $pelanggan->nomor_hp) }}" min="0">
                                        @include('layouts.error', ['name' => 'nomor_hp'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-solid" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" min="0">
                                        @include('layouts.error', ['name' => 'alamat'])
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="id_user">Email</label>
                                        <input type="hidden" name="id_user" id="id_user" value="{{$pelanggan->users->id ?? old('id_user')}}">
                                        <input type="text" class="form-control form-control-solid @error('users') is-invalid @enderror" placeholder="Users" id="users" 
                                            name="users" value="{{$pelanggan->users->email ?? old('email')}}" aria-label="Users" ariadescribedby="cari" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex d-flex justify-content-end">
                            <a href="{{ route('profile.index') }}" typ3="button" class="btn btn-light me-5">
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

    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto").change(function() {
        readURL(this);
        //$('#hasil').show();
    });

    function previewImage() {
    const foto = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
    </script>
    @endsection

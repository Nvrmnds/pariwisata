@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('paketWisata.update', $paketWisata) }}" method="POST" id="kt_edit_item" enctype="multipart/form-data">
        @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $paketWisata->id }}">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('error'))
                                @include('layouts.flash-error', ['message' => Session('error')])
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    @include('layouts.flash-error', ['message' => $error])
                                @endforeach
                            @endif

                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="namaPaket">Nama Paket Wisata</label>
                                                <input type="text" class="form-control form-control-solid" name="namaPaket" value="{{ old('namaPaket', $paketWisata->namaPaket) }}">
                                                @include('layouts.error', ['name' => 'paketWisata'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="fasilitas">Fasilitas</label>
                                                <input type="text" class="form-control form-control-solid" name="fasilitas" value="{{ old('fasilitas', $paketWisata->fasilitas) }}">
                                                @include('layouts.error', ['name' => 'fasilitas'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="itinerary">Itinerary</label>
                                                <input type="text" class="form-control form-control-solid" name="itinerary" value="{{ old('itinerary', $paketWisata->itinerary) }}">
                                                @include('layouts.error', ['name' => 'itinerary'])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="diskon">Diskon</label>
                                                <input type="number" class="form-control form-control-solid" name="diskon" value="{{ old('diskon', $paketWisata->diskon) }}">
                                                @include('layouts.error', ['name' => 'diskon'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" cols="30" rows="5" class="form-control form-control-solid">{{ old('diskon', $paketWisata->deskripsi) }}</textarea>
                                                @include('layouts.error', ['name' => 'deskripsi'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto1" class="form-label">Foto 1</label>
                                                @if($paketWisata->foto1)
                                                <img src="{{ asset('storage/'. $paketWisata->foto1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @endif
                                                <input class="form-control @error('foto1') is-invalid @enderror" type="file"  id="foto1" name="foto1" value="{{$paketWisata->foto1 ?? old('foto1')}}" onchange="previewImage()">
                                                @error('foto1') <span class="textdanger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto2" class="form-label">Foto 2</label>
                                                @if($paketWisata->foto2)
                                                <img src="{{ asset('storage/'. $paketWisata->foto2) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @endif
                                                <input class="form-control @error('foto2') is-invalid @enderror" type="file"  id="foto2" name="foto2" value="{{$paketWisata->foto2 ?? old('foto2')}}" onchange="previewImage()">
                                                @error('foto2') <span class="textdanger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto3" class="form-label">Foto 3</label>
                                                @if($paketWisata->foto3)
                                                <img src="{{ asset('storage/'. $paketWisata->foto3) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @endif
                                                <input class="form-control @error('foto3') is-invalid @enderror" type="file"  id="foto3" name="foto3" value="{{$paketWisata->foto3 ?? old('foto3')}}" onchange="previewImage()">
                                                @error('foto3') <span class="textdanger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto4" class="form-label">Foto 4</label>
                                                @if($paketWisata->foto4)
                                                <img src="{{ asset('storage/'. $paketWisata->foto4) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @endif
                                                <input class="form-control @error('foto4') is-invalid @enderror" type="file"  id="foto4" name="foto4" value="{{$paketWisata->foto4 ?? old('foto4')}}" onchange="previewImage()">
                                                @error('foto4') <span class="textdanger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto5" class="form-label">Foto 5</label>
                                                @if($paketWisata->foto5)
                                                <img src="{{ asset('storage/'. $paketWisata->foto5) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @endif
                                                <input class="form-control @error('foto5') is-invalid @enderror" type="file"  id="foto5" name="foto5" value="{{$paketWisata->foto5 ?? old('foto5')}}" onchange="previewImage()">
                                                @error('foto5') <span class="textdanger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex d-flex justify-content-end">
                            <a href="{{ route('paketWisata.index') }}" type="button" class="btn btn-light me-5">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('onpage-js')
@endsection

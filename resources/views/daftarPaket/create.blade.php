@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('daftarPaket.store') }}" method="POST" id="formTambahDaftarPaket">
        @csrf
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="nama_paket">Nama Paket</label>
                                    <input type="text" class="form-control form-control-solid" name="nama_paket" value="{{ old('nama_paket') }}">
                                    @include('layouts.error', ['name' => 'nama_paket'])
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="idPaketWisata">ID Paket Wisata</label>
                                    <div class="input-group">
                                        <input class="form-control form-control-solid" type="hidden" name="idPaketWisata" id="idPaketWisata"
                                            value="{{old('idPaketWisata')}}">
                                        <input class="form-control form-control-solid" type="text" class="form-control @error('namaPaket') is-invalid @enderror" id="namaPaket"
                                            name="namaPaket" value="{{old('namaPaket')}}"
                                            aria-label="ID Paket Wisata" aria-describedby="cari" readonly>
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                            data-bs-target="#staticBackdrop"></i>
                                            Cari Data Paket Wisata</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="jumlahPeserta">Jumlah Peserta</label>
                                    <input type="text" class="form-control form-control-solid" name="jumlahPeserta" value="{{ old('jumlahPeserta') }}">
                                    @include('layouts.error', ['name' => 'jumlahPeserta'])
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="hargaPaket">Harga Paket</label>
                                    <input type="number" class="form-control form-control-solid" name="hargaPaket" value="{{ old('hargaPaket') }}">
                                    @include('layouts.error', ['name' => 'hargaPaket'])
                                </div>
                            </div>
                        </div><br>
                    </div>

                    <div class="card-footer d-flex d-flex justify-content-end">
                        <a href="{{ route('daftarPaket.index') }}" class="btn btn-light me-5">Kembali</a>
                        <button type="submit" class="btn btn-primary" id="btnTambahDaftarPaket">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Paket Wisata</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Paket Wisata</th>
                                <th>Fasilitas</th>
                                <th>Itinerary</th>
                                <th>Diskon</th>
                                <th>Deskripsi</th>
                                <th>Foto 1</th>
                                <th>Foto 2</th>
                                <th>Foto 3</th>
                                <th>Foto 4</th>
                                <th>Foto 5</th>
                                <th class="text-end min-w-70px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paketWisatas as $key => $paketWisata)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td id={{$key+1}}>{{$paketWisata->namaPaket}}</td>
                                <td id={{$key+1}}>{{$paketWisata->fasilitas}}</td>
                                <td id={{$key+1}}>{{$paketWisata->itinerary}}</td>
                                <td id={{$key+1}}>{{$paketWisata->diskon}}</td>
                                <td id={{$key+1}}>{{$paketWisata->deskripsi}}</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-sm-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by2 me-4">
                                            <div class="symbol-label"
                                                style="background-image: url('storage/{{$paketWisata->foto1}}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-sm-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by2 me-4">
                                            <div class="symbol-label"
                                                style="background-image: url('storage/{{$paketWisata->foto2}}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-sm-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by2 me-4">
                                            <div class="symbol-label"
                                                style="background-image: url('storage/{{$paketWisata->foto3}}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-sm-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by2 me-4">
                                            <div class="symbol-label"
                                                style="background-image: url('storage/{{$paketWisata->foto4}}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-sm-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by2 me-4">
                                            <div class="symbol-label"
                                                style="background-image: url('storage/{{$paketWisata->foto5}}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="pilih('{{$paketWisata->id}}', '{{$paketWisata->namaPaket}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

@section('onpage-js')
<script>
$('#example2').DataTable({
        "responsive": true,
    });
    
    function pilih(id, namaPaket) {
        document.getElementById('idPaketWisata').value = id
        document.getElementById('namaPaket').value = namaPaket
    }

    // Define form element
    const form = document.getElementById('formTambahDaftarPaket');

    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'nama_paket': {
                    validators: {
                        notEmpty: {
                            message: 'Nama Paket harus di isi'
                        }
                    }
                },
                'idPaketWisata': {
                    validators: {
                        notEmpty: {
                            message: 'ID Paket Wisata harus di isi'
                        }
                    }
                },
                'jumlahPeserta': {
                    validators: {
                        notEmpty: {
                            message: 'Jumlah Peserta harus di isi'
                        }
                    }
                },
                'hargaPaket': {
                    validators: {
                        notEmpty: {
                            message: 'Harga Paket harus di isi'
                        }
                    }
                },
            },

            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );

    // Submit button handler
    const submitButton = document.getElementById('btnTambahDaftarPaket');
    submitButton.addEventListener('click', function (e) {
        // Prevent default button action
        e.preventDefault();

        // Validate form before submit
        if (validator) {
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    form.submit(); // Submit form
                }
            });
        }
    });
</script>
@endsection

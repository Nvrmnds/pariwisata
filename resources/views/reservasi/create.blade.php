@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('reservasi.store') }}" method="POST" id="formTambahReservasi">
        @csrf
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control @error('idPelanggan') is-invalid @enderror" id="idPelanggan" 
                            placeholder="Tanggal Pemesanan" name="idPelanggan" value="{{ Auth::user()->pelanggan->id }}">
                            @error('idPelanggan') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="idDaftarPaket">ID Daftar Paket</label>
                                    <div class="input-group">
                                        <input class="form-control form-control-solid" type="hidden" name="idDaftarPaket" id="idDaftarPaket"
                                            value="{{old('idDaftarPaket')}}">
                                        <input class="form-control form-control-solid" type="text" class="form-control @error('nama_paket') is-invalid @enderror" placeholder="Cari Daftar Paket..." id="nama_paket"
                                            name="nama_paket" value="{{old('nama_paket')}}"
                                            aria-label="Cari Daftar Paket" aria-describedby="cari" readonly>
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                            data-bs-target="#staticBackdrop1"></i>
                                            Cari Daftar Paket</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tglReservasiWisata" class="form-label required">Tanggal Pemesanan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                    <path opacity="0.3"
                                                        d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                        fill="black" />
                                                    <path
                                                        d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <input class="form-control form-control-solid" name="tglReservasiWisata" id="tglReservasiWisata" value="{{old('tglReservasiWisata')}}"/>
                                    </div>
                                    @include('layouts.error', ['name' => 'tglReservasiWisata'])
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="jumlah_peserta">Jumlah Peserta</label>
                                    <input type="text" class="form-control form-control-solid" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}">
                                    @include('layouts.error', ['name' => 'jumlah_peserta'])
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label class="form-label" for="harga">Harga</label>
                                    <input type="number" class="form-control form-control-solid @error('harga') is-invalid @enderror" name="harga" id="harga"
                                        value="{{ old('harga') }}" onchange = "hargadisk()">
                                    @include('layouts.error', ['name' => 'harga'])
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="diskon">Diskon Dalam Persenan</label>
                                    <input type="number" class="form-control form-control-solid @error('diskon') is-invalid @enderror" id="diskon" max='100' name="diskon" 
                                        value="{{old('diskon')}}" onchange = "hargadisk()">
                                        @include('layouts.error', ['name' => 'diskon'])
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="nilaiDiskon">Nilai Diskon</label>
                                    <input type="number" class="form-control form-control-solid @error('nilaiDiskon') is-invalid @enderror" id="nilaiDiskon" name="nilaiDiskon" 
                                        value="{{old('nilaiDiskon')}}" readonly>
                                        @include('layouts.error', ['name' => 'nilaiDiskon'])
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="totalBayar">Total Bayar</label>
                                    <input type="number" class="form-control form-control-solid @error('totalBayar') is-invalid @enderror" id="totalBayar" name="totalBayar" 
                                        value="{{old('totalBayar')}}" readonly>
                                        @include('layouts.error', ['name' => 'totalBayar'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex d-flex justify-content-end">
                        <a href="{{ route('reservasi.index') }}" class="btn btn-light me-5">Kembali</a>
                        <button type="submit" class="btn btn-primary" id="btnTambahReservasiPelanggan">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggan as $key => $pelanggan)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pelanggan->namaLengkap}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$pelanggan->id}}', '{{$pelanggan->namaLengkap}}')" data-bs-dismiss="modal">
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

<!-- Modal -->
         <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Daftar Paket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>ID Paket Wisata</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Harga Paket</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftarPaket as $key => $daftarPaket)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$daftarPaket->nama_paket}}</td>
                                    <td>{{$daftarPaket->paketWisata->namaPaket}}</td>
                                    <td>{{$daftarPaket->jumlahPeserta}}</td>
                                    <td>{{$daftarPaket->hargaPaket}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="pilih1('{{$daftarPaket->id}}', '{{$daftarPaket->nama_paket}}')" data-bs-dismiss="modal">
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
    $("#tglReservasiWisata").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    $('#example2').DataTable({
            "responsive": true,
        });
        
        function pilih(id, pelanggan) {
            document.getElementById('idPelanggan').value = id
            document.getElementById('pelanggan').value = pelanggan
        }

        function pilih1(id, nama_paket) {
            document.getElementById('idDaftarPaket').value = id
            document.getElementById('nama_paket').value = nama_paket
        }

        //Begin :: Menghitung Diskon
        function hargadisk(){
            var harga = document.getElementById('harga').value;
            var diskon = document.getElementById('diskon').value;
            // var peserta = document.getElementById('jumlah_peserta').value;
            
            diskon_decimal = diskon/100;
            perhitungan_diskon = harga*diskon_decimal;
            harga_dis = harga-perhitungan_diskon;
            total = harga - perhitungan_diskon;
            document.getElementById('totalBayar').value= total;
            document.getElementById('nilaiDiskon').value= perhitungan_diskon;
          }
          //End :: Menghitung Diskon

    // Define form element
    const form = document.getElementById('formTambahReservasi');

    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'idDaftarPaket': {
                    validators: {
                        notEmpty: {
                            message: 'Nama Karyawan harus di isi'
                        }
                    }
                },
                'alamat': {
                    validators: {
                        notEmpty: {
                            message: 'ALamat harus di isi'
                        }
                    }
                },
                'nomorHp': {
                    validators: {
                        notEmpty: {
                            message: 'Nomor Hp harus di isi'
                        }
                    }
                },
                'jabatan': {
                    validators: {
                        notEmpty: {
                            message: 'Jabatan harus di isi'
                        }
                    }
                },
                'id_user': {
                    validators: {
                        notEmpty: {
                            message: 'ID User harus di isi'
                        }
                    }
                }
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
    const submitButton = document.getElementById('btnTambahReservasiPelanggan');
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

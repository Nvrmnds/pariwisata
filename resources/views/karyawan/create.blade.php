@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('karyawan.store') }}" method="POST" id="formTambahKaryawan">
        @csrf
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="namaKaryawan">Nama Karyawan</label>
                                    <input type="text" class="form-control form-control-solid" name="namaKaryawan" value="{{ old('namaKaryawan') }}">
                                    @include('layouts.error', ['name' => 'namaKaryawan'])
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-solid" name="alamat" value="{{ old('alamat') }}">
                                    @include('layouts.error', ['name' => 'alamat'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="nomorHp">Nomor Hp</label>
                                    <input type="text" class="form-control form-control-solid" name="nomorHp" value="{{ old('nomorHp') }}">
                                    @include('layouts.error', ['name' => 'nomorHp'])
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="jabatan">Jabatan</label>
                                    <select class="form-control form-select form-select-solid @error('jabatan') isinvalid @enderror" id="jabatan"
                                        name="jabatan" aria-label="Pilih Jabatan" data-control="select2" data-placeholder="Pilih Jabatan...">
                                        <option value="">Pilih Jabatan...</option>
                                        <option value="administrasi" @if(old('jabatan')=='administrasi' )selected @endif>Administrasi</option>
                                        <option value="operator" @if(old('jabatan')=='operator' )selected @endif>Operator</option>
                                        <option value="pemilik" @if(old('jabatan')=='pemilik' )selected @endif>Pemilik</option>
                                    </select>
                                    @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="id_user">ID User</label>
                                    <div class="input-group">
                                        <input class="form-control form-control-solid" type="hidden" name="id_user" id="id_user"
                                            value="{{old('id_user')}}">
                                        <input class="form-control form-control-solid" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="ID User" id="email"
                                            name="email" value="{{old('email')}}"
                                            aria-label="ID User" aria-describedby="cari" readonly>
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                            data-bs-target="#staticBackdrop"></i>
                                            Cari Data User</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex d-flex justify-content-end">
                        <a href="{{ route('karyawan.index') }}" class="btn btn-light me-5">Kembali</a>
                        <button type="submit" class="btn btn-primary" id="btnTambahKaryawan">Tambah</button>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Karyawan</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aktif</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$user->name}}</td>
                                <td id={{$key+1}}>{{$user->email}}</td>
                                <td id={{$key+1}}>{{$user->level}}</td>
                                <td id={{$key+1}}>{{$user->aktif}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="pilih('{{$user->id}}', '{{$user->email}}')" data-bs-dismiss="modal">
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
    // Form Validator
        // Define form element
        const form = document.getElementById('formTambahKaryawan');
        var validator = [];

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Validator untuk di step 1
        validator.push(FormValidation.formValidation(
            form, {
                fields: {
                    'namaKaryawan': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Karyawan harus di isi'
                            }
                        }
                    },
                    'alamat': {
                        validators: {
                            notEmpty: {
                                message: 'alamat harus di isi'
                            }
                        }
                    },
                    'nomorHp': {
                        validators: {
                            notEmpty: {
                                message: 'nomorHp harus di isi'
                            }
                        }
                    },
                    'jabatan': {
                        validators: {
                            notEmpty: {
                                message: 'jabatan harus di isi'
                            }
                        }
                    },
                    'id_user': {
                        validators: {
                            notEmpty: {
                                message: 'id_user harus di isi'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: 'is-invalid',
                        eleValidClass: ''
                    })
                }
            }
        ));

        $('#example2').DataTable({
                "responsive": true,
            });
            
            function pilih(id, email) {
                document.getElementById('id_user').value = id
                document.getElementById('email').value = email
            }

        // begin::Handle submit event
        submitButton.addEventListener("click", (function(e) {
            e.preventDefault()

            var validate = validator[stepper.getCurrentStepIndex() - 1];

            // Validate form before submit
            if (validate) {
                validate.validate().then(function(status) {
                    if (status == 'Valid') {
                        $('form#formtambahKaryawan').submit();
                    }
                });
            } else {
                $('form#formtambahKaryawan').submit();
            }
        }));
        // end::Handle submit event
</script>
@endsection

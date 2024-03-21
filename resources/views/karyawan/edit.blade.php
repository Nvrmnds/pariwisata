@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error',[ 'message'=> $error ])
            @endforeach
        @endif
        
        <form action="{{ route('karyawan.update', $karyawan) }}" method="POST" id="kt_create_pengeluaran">
            @csrf
            <input type="hidden" name="id" value="{{ $karyawan->id }}">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="namaKaryawan">Nama Karyawan</label>
                                        <input type="text" class="form-control form-control-solid" name="namaKaryawan" value="{{ old('namaKaryawan', $karyawan->namaKaryawan) }}">
                                        @include('layouts.error', ['name' => 'namaKaryawan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-solid" name="alamat" value="{{ old('alamat', $karyawan->alamat) }}">
                                        @include('layouts.error', ['name' => 'alamat'])
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="nomorHp">Nomor Hp</label>
                                        <input type="text" class="form-control form-control-solid" name="nomorHp" value="{{ old('nomorHp', $karyawan->nomorHp) }}">
                                        @include('layouts.error', ['name' => 'nomorHp'])
                                    </div>
                                </div>
                            </div>
                            <div class="fv-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class='form-label' for="jabatan">Jabatan</label>
                                        <select class="form-control form-select form-select-solid @error('jabatan') isinvalid @enderror" id="jabatan"
                                            name="jabatan" aria-label="Pilih Jabatan" data-control="select2" data-placeholder="Pilih Jabatan...">
                                            <option value="">Pilih Jabatan...</option>
                                            <option value="administrasi" @if($karyawan->jabatan == 'administrasi' || old('jabatan') == 'administrasi')selected @endif>Administrasi</option>
                                            <option value="operator" @if($karyawan->jabatan == 'operator' || old('jabatan') == 'operator')selected @endif>Operator</option>
                                            <option value="pemilik" @if($karyawan->jabatan == 'pemilik' || old('jabatan') == 'pemilik')selected @endif>Pemilik</option>
                                        </select>
                                        @error('jabatan')
                                            <span class="textdanger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="id_user">ID User</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-solid" type="hidden" name="id_user" id="id_user"
                                                value="{{$karyawan->karyawan->id ?? old('id_user')}}">
                                            <input class="form-control form-control-solid" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="ID User" id="email"
                                                name="email" value="{{$karyawan->user->email ?? old('email')}}"
                                                aria-label="ID User" aria-describedby="cari" readonly>
                                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                                data-bs-target="#staticBackdrop"></i>
                                                Cari Data User
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex d-flex justify-content-end">
                            <a href="{{ route('karyawan.index') }}" class="btn btn-light me-5">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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

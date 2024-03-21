@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <form action="{{ route('users.index') }}" method="get">
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" name="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari User" onblur="this.form.submit()">
                </div>
            </form>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <!--begin::Add customer-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_tambah_user">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11" y="18" width="12" height="2"
                                    rx="1" transform="rotate(-90 11 18)" fill="black" />
                                <rect x="6" y="11" width="12" height="2" rx="1"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    Tambah User
                </button>
                <!-- <a href="{{ route('users.create')}}" class="btn btn-primary">Tambah User</a> -->
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-5">
        @if(Session::has('success'))
            @include('layouts.flash-success',[ 'message'=> Session('success') ])
        @endif
        <!--begin::Row-->
        <div class="row g-10">

            <div class="card mt-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="kt_datatable_example_4" class="table table-striped table-row-bordered gy-5 gs-7">
                            <thead>
                                <tr class="fw-bold fs-6 text-gray-800">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aktif</th>
                                    <th class="text-end min-w-70px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>{{ $user->aktif }}</td>
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">Opsi
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('users.edit', $user) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->


                                            <!--begin::Delete button-->
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" id="deleteUser{{ $user->id }}">
                                                @method('delete')
                                                @csrf
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a onclick="onDelete({{$user->id}}, '{{$user->name}}')" class="menu-link px-3">Hapus</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </form>
                                            <!--end::Delete button-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
    </div>
    <!--end::Card body-->

    <!-- begin::modal -->
    <div class="modal fade" tabindex="-1" id="kt_modal_tambah_user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Form Tambah User</h5>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
    
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST" id="formTambahUser">
                        @csrf
                        <div class="fv-row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="name">Nama</label>
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{ old('name') }}">
                                    @include('layouts.error', ['name' => 'name'])
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="email">Email</label>
                                    <input type="text" class="form-control form-control-solid" name="email" value="{{ old('email') }}">
                                    @include('layouts.error', ['name' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-5" data-kt-password-meter="true">
                            <div class="col">
                                <div class="form-group">
                                    <!--begin::Label-->
                                    <label class="form-label" for="password">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="off">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--begin::Hint-->
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                                </div>
                                <!--end::Hint-->
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="col">
                                <div class="form-group">
                                <label class="form-label" for="konfirmasiPassword">Konfirmasi Password</label>
                                <input id="konfirmasiPassword" type="password" class="form-control form-control-lg form-control-solid"
                                    name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="fv-row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="level">Level</label>
                                    <select class="form-control form-select form-select-solid fw-bolder @error('level') isinvalid @enderror" id="level"
                                        name="level" aria-label="Pilih Level" data-control="select2" data-placeholder="Pilih Level">
                                        <option value="">Pilih Level...</option>
                                        <option value="admin" @if(old('level')=='admin' )selected @endif>Admin</option>
                                        <option value="operator" @if(old('level')=='operator' )selected @endif>Operator</option>
                                        <option value="pelanggan" @if(old('level')=='pelanggan' )selected @endif>Pelanggan</option>
                                        <option value="pemilik" @if(old('level')=='pemilik' )selected @endif>Pemilik</option>
                                    </select>
                                    @error('level') <span class="textdanger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" id="btnTambahUser">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end::modal -->
</div>
<!--end::Card-->
@endsection

@section('onpage-js')

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('themes/metronic-demo9/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->

<script>
$("#kt_datatable_example_4").DataTable({
    "scrollY": 300,
    "scrollX": true
});

    function onDelete(id, name) {
        Swal.fire({
            html: 'Are you sure delete <strong>'+name+'</strong> ?',
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ok, got it!",
            cancelButtonText: 'Nope, cancel it',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then(function (isConfirm) {
           
            // IF User Choose Cancel
            if (!isConfirm.isConfirmed) return;

            document.getElementById('deleteUser'+id).submit();

        });
    }

    // Define form element
    const form = document.getElementById('formTambahUser');

    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'name': {
                    validators: {
                        notEmpty: {
                            message: 'Nama harus di isi'
                        }
                    }
                },
                'email': {
                    validators: {
                        notEmpty: {
                            message: 'Email harus di isi'
                        }
                    }
                },
                'password': {
                    validators: {
                        notEmpty: {
                            message: 'Password harus di isi'
                        }
                    }
                },
                'password_confirmation': {
                    validators: {
                        notEmpty: {
                            message: 'Konfirmasi password harus di isi'
                        }
                    }
                },
                'level': {
                    validators: {
                        notEmpty: {
                            message: 'Level harus di isi'
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
    const submitButton = document.getElementById('btnTambahUser');
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

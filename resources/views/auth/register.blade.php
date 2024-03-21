@extends('auth.auth-template')
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" id="kt_sign_up_form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Buat Akun</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Sudah punya Akun?
                            <a href="{{ route('login') }}" class="link-success fw-bolder">Masuk disini</a>
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Action-->
                    {{-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                        <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in
                        with Google</button>
                    <!--end::Action--> --}}
                    <!--begin::Separator-->
                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">Atau</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>
                    <!--end::Separator-->

                    <!--begin::Input group-->
                    <div class="row">
                        <div class="col">
                            <div class="fv-row mb-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label fw-bolder text-dark fs-6">Nama</label>
                                        <input id="name" type="text" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
                                        <input id="namaLengkap" type="namaLengkap" class="form-control form-control-lg form-control-solid @error('namaLengkap') is-invalid @enderror"
                                        name="namaLengkap" value="{{ old('namaLengkap') }}" required autocomplete="namaLengkap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row">
                        <div class="col">
                            <div class="fv-row mb-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                        <input id="email" type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label fw-bolder text-dark fs-6">Nomor Hp</label>
                                        <input id="nomor_hp" type="text" class="form-control form-control-lg form-control-solid @error('nomor_hp') is-invalid @enderror"
                                         name="nomor_hp" value="{{ old('nomor_hp') }}" required autocomplete="nomor_hp" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!-- begin::Input Group -->
                    <div class="row">
                        <div class="col">
                            <div class="fv-row mb-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label fw-bolder text-dark fs-6">Alamat</label>
                                        <textarea id="alamat" type="text" class="form-control form-control-lg form-control-solid @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat') }}" cols="30" rows="3" required autocomplete="alamat" autofocus></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6">Password</label>
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

                                <!-- <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span> -->
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
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol.
                        </div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control form-control-lg form-control-solid"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">Saya Setuju
                                <a href="#" class="ms-1 link-success">Syarat dan Ketentuan</a>.</span>
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-success">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
            <!--begin::Links-->
            <div class="d-flex flex-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                <a href="https://keenthemes.com/support" class="text-muted text-hover-primary px-2"
                    target="_blank">Support</a>
                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2"
                    target="_blank">Purchase</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Body-->
@endsection

@section('onpage-js')
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('themes/metronic-demo9/js/custom/authentication/sign-up/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endsection

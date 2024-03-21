@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <div class="container">

        <!--begin::Post-->
        <div class="row justify-content-center">

            <!--begin::Stepper-->
            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                id="kt_create_product_stepper">
                <!--begin::Aside-->
                <div
                    class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
                    <!--begin::Wrapper-->
                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                        <!--begin::Nav-->
                        <div class="stepper-nav">
                            <!--begin::Step 1-->
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Paket Wisata</h3>
                                    <div class="stepper-desc fw-bold">Tentukan informasi Paket Wisata</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Foto Paket Wisata</h3>
                                    <div class="stepper-desc fw-bold">Tentukan Foto Paket Wisata</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 2-->
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="card d-flex flex-row-fluid flex-center" id="divItem">
                    <!--begin::Form-->
                    <form action="{{ route('paketWisata.store') }}" method="POST" enctype="multipart/form-data"
                        class="card-body py-20 w-100 w-xl-700px px-9" novalidate="novalidate" id="kt_create_paketWisata_form">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder d-flex align-items-center text-dark">Informasi Paket Wisata
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Deskripsikan Paket Wisata yang akan anda masukan"></i>
                                    </h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon cek
                                        <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Input group-->
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
                                                    <label class="form-label required" for="namaPaket">Nama Paket</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="namaPaket" value="{{ old('namaPaket') }}">
                                                    @include('layouts.error', ['name' => 'namaPaket'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label required" for="fasilitas">Fasilitas</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="fasilitas" value="{{ old('fasilitas') }}">
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
                                                    <label class="form-label required" for="itinerary">Itinerary</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="itinerary" value="{{ old('itinerary') }}">
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
                                                    <input type="number" class="form-control form-control-solid"
                                                        name="diskon" value="{{ old('diskon') }}">
                                                    @include('layouts.error', ['name' => 'diskon'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" cols="30" rows="10" class="form-control form-control-solid">{{ old('deskripsi') }}</textarea>
                                            @include('layouts.error', ['name' => 'deskripsi'])
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->

                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">
                                        Tentukan Foto Paket Wisata
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Masukan foto Paket Wisata yang akan anda simpan"></i>
                                    </h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon
                                        cek
                                        <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Input group-->
                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label required" for="foto1">Foto 1</label><br>
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/themes/metronic-demo9/media/avatars/default.png)">
                                                        <!--begin::Image preview wrapper-->
                                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                                        <!--end::Image preview wrapper-->

                                                        <!--begin::Edit button-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="change"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Ganti Foto">
                                                            <i class="bi bi-pencil-fill fs-7"></i>

                                                            <!--begin::Inputs-->
                                                            <input type="file" name="foto1" value="{{ old('foto1') }}" accept=".png, .jpg, .jpeg" />
                                                            @include('layouts.error', ['name' => 'foto1'])
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit button-->

                                                        <!--begin::Cancel button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="cancel"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Hapus Foto">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel button-->

                                                        <!--begin::Remove button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="remove"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove button-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                <label class="form-label required" for="foto2">Foto 2</label><br>
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/themes/metronic-demo9/media/avatars/default.png)">
                                                        <!--begin::Image preview wrapper-->
                                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                                        <!--end::Image preview wrapper-->

                                                        <!--begin::Edit button-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="change"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Ganti Foto">
                                                            <i class="bi bi-pencil-fill fs-7"></i>

                                                            <!--begin::Inputs-->
                                                            <input type="file" name="foto2" value="{{ old('foto2') }}" accept=".png, .jpg, .jpeg" />
                                                            @include('layouts.error', ['name' => 'foto2'])
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit button-->

                                                        <!--begin::Cancel button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="cancel"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Hapus Foto">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel button-->

                                                        <!--begin::Remove button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="remove"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove button-->
                                                    </div>
                                                    <!--end::Image input-->
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
                                                    <label class="form-label required" for="foto3">Foto 3</label><br>
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/themes/metronic-demo9/media/avatars/default.png)">
                                                        <!--begin::Image preview wrapper-->
                                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                                        <!--end::Image preview wrapper-->

                                                        <!--begin::Edit button-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="change"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Ganti Foto">
                                                            <i class="bi bi-pencil-fill fs-7"></i>

                                                            <!--begin::Inputs-->
                                                            <input type="file" name="foto3" value="{{ old('foto3') }}" accept=".png, .jpg, .jpeg" />
                                                            @include('layouts.error', ['name' => 'foto3'])
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit button-->

                                                        <!--begin::Cancel button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="cancel"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Hapus Foto">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel button-->

                                                        <!--begin::Remove button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="remove"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove button-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                <label class="form-label required" for="foto4">Foto 4</label><br>
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/themes/metronic-demo9/media/avatars/default.png)">
                                                        <!--begin::Image preview wrapper-->
                                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                                        <!--end::Image preview wrapper-->

                                                        <!--begin::Edit button-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="change"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Ganti Foto">
                                                            <i class="bi bi-pencil-fill fs-7"></i>

                                                            <!--begin::Inputs-->
                                                            <input type="file" name="foto4" value="{{ old('foto4') }}" accept=".png, .jpg, .jpeg" />
                                                            @include('layouts.error', ['name' => 'foto4'])
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit button-->

                                                        <!--begin::Cancel button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="cancel"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Hapus Foto">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel button-->

                                                        <!--begin::Remove button-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="remove"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-dismiss="click"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove button-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label required" for="foto5">Foto 5</label><br>
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/themes/metronic-demo9/media/avatars/default.png)">
                                                    <!--begin::Image preview wrapper-->
                                                    <div class="image-input-wrapper w-125px h-125px"></div>
                                                    <!--end::Image preview wrapper-->

                                                    <!--begin::Edit button-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="change"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-dismiss="click"
                                                        title="Ganti Foto">
                                                        <i class="bi bi-pencil-fill fs-7"></i>

                                                        <!--begin::Inputs-->
                                                        <input type="file" name="foto5" value="{{ old('foto5') }}" accept=".png, .jpg, .jpeg" />
                                                        @include('layouts.error', ['name' => 'foto5'])
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit button-->

                                                    <!--begin::Cancel button-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="cancel"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-dismiss="click"
                                                        title="Hapus Foto">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel button-->

                                                    <!--begin::Remove button-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="remove"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-dismiss="click"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove button-->
                                                </div>
                                                <!--end::Image input-->  
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-10">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3"
                                    data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13"
                                                height="2" rx="1" fill="black" />
                                            <path
                                                d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Back
                                </button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="btn btn-lg btn-primary me-3"
                                    data-kt-stepper-action="submit">
                                    <span class="indicator-label">Submit
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13"
                                                    height="2" rx="1" transform="rotate(-180 18 13)"
                                                    fill="black" />
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary"
                                    data-kt-stepper-action="next">Continue
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                height="2" rx="1" transform="rotate(-180 18 13)"
                                                fill="black" />
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->

                    <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;"
                        id="overlayDivItem">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                </div>
                <!--end::Content-->
            </div>
            <!--end::Stepper-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('onpage-js')
    <!--begin::Stepper form handle script-->
    <script>
        // Form Validator
        // Define form element
        const form = document.getElementById('kt_create_paketWisata_form');
        var validator = [];

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Validator untuk di step 1
        validator.push(FormValidation.formValidation(
            form, {
                fields: {
                    'namaPaket': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Paket harus di isi'
                            }
                        }
                    },
                    'fasilitas': {
                        validators: {
                            notEmpty: {
                                message: 'Fasilitas harus di isi'
                            }
                        }
                    },
                    'itinerary': {
                        validators: {
                            notEmpty: {
                                message: 'Itinerary harus di isi'
                            }
                        }
                    },
                    'deskripsi': {
                        validators: {
                            notEmpty: {
                                message: 'Deskripsi harus di isi'
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

        // Stepper lement
        var element = document.querySelector("#kt_create_product_stepper");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            var validate = validator[stepper.getCurrentStepIndex() - 1];

            // Validate form before submit
            if (validate) {
                validate.validate().then(function(status) {
                    if (status == 'Valid') {
                        stepper.goNext(); // go next step
                    }
                });
            } else {
                stepper.goNext(); // go next step
            }
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });

        // begin::Stepper change event
        submitButton = element.querySelector('[data-kt-stepper-action="submit"]');

        var formSubmitButton = submitButton;

        stepper.on('kt.stepper.changed', function(stepper) {
            if (stepper.getCurrentStepIndex() === 2) {
                formSubmitButton.classList.remove('d-none');
                formSubmitButton.classList.add('d-inline-block');
            } else {
                formSubmitButton.classList.remove('d-inline-block');
                formSubmitButton.classList.remove('d-none');
            }
        });

        // end::Stepper change event

        // begin::Handle submit event
        submitButton.addEventListener("click", (function(e) {
            e.preventDefault()

            var validate = validator[stepper.getCurrentStepIndex() - 1];

            // Validate form before submit
            if (validate) {
                validate.validate().then(function(status) {
                    if (status == 'Valid') {
                        $('form#kt_create_paketWisata_form').submit();
                    }
                });
            } else {
                $('form#kt_create_paketWisata_form').submit();
            }
        }));
        // end::Handle submit event
    </script>
    <!--end::Stepper form handle script-->

    <!--begin::Other form event-->
    
    
    
    <!--end::Other form event-->
@endsection

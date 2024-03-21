@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
		<!--begin::Navbar-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="storage/{{$pelanggan->foto}}" alt="{{$pelanggan->foto}}">
							<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success"></div>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
						<div class="flex-grow-1">
							<!--begin::Title-->
							<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
								<!--begin::User-->
								<div class="d-flex flex-column">
									<!--begin::Name-->
									<div class="d-flex align-items-center mb-2">
										<a class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ Auth::user()->name }}</a>
									</div>
									<!--end::Name-->
									<!--begin::Info-->
									<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
										<a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
										<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"></path>
												<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->{{$pelanggan->users->email}}</a>
									</div>
									<!--end::Info-->
								</div>
								<!--end::User-->
							</div>
							<!--end::Title-->
						</div>
						<!--end::Info-->
					</div>
					<!--end::Details-->
				</div>
			</div>
			<!--end::Navbar-->
			<!--begin::details View-->
			<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Detail Profil</h3>
					</div>
					<!--end::Card title-->
					<!--begin::Action-->
					<a href="{{ route('profile.edit', $pelanggan->id) }}" class="menu-link btn btn-primary align-self-center"
					data-bs-toggle="modal" data-bs-target="#kt_modal_1">Edit Profile</a>
					<!--end::Action-->
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Nama</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
                            <td>:</td>
							<span class="fw-bolder fs-6 text-gray-800">{{$pelanggan->namaLengkap}}</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Nomor Handphone
							<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Nomor Handphone harus aktif" aria-label="Phone number must be active"></i></label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
                            <td>:</td>
                            <span class="fw-bolder fs-6 text-gray-800">{{$pelanggan->nomor_hp}}</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Alamat
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Alamat harus Lengkap" aria-label="Country of origination"></i>
                        </label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
                            <td>:</td>
                            <span class="fw-bolder fs-6 text-gray-800">{{$pelanggan->alamat}}</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::details View-->				
		</div>
		<!--end::Container-->

		<!-- begin::Modal -->
		<form action="{{route('profile.update', $pelanggan)}}" method="post" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="modal fade" tabindex="-1" id="kt_modal_1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Edit Profile</h5>

						<!--begin::Close-->
						<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
							<span class="svg-icon svg-icon-2x"></span>
						</div>
						<!--end::Close-->
					</div>

					<div class="modal-body">
						<label for="foto" class="form-label">Foto</label>
						@if($pelanggan->foto)
                        	<img src="{{ asset('storage/'. $pelanggan->foto) }}" data-kt-image-input="true" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @endif
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" value="{{$pelanggan->foto ?? old('foto')}}" onchange="previewImage()">
                        @error('foto') <span class="textdanger">{{$message}}</span> @enderror
						

						<br>

						<label class="form-label" for="namaLengkap">Nama</label>
                        <input type="text" class="form-control form-control-solid" name="namaLengkap" value="{{ old('namaLengkap', $pelanggan->namaLengkap) }}" min="0">
                        @include('layouts.error', ['name' => 'namaLengkap'])

						<br>

						<label class="form-label" for="nomor_hp">Nomor Handphone</label>
                        <input type="number" class="form-control form-control-solid" name="nomor_hp" value="{{ old('nomor_hp', $pelanggan->nomor_hp) }}" min="0">
                        @include('layouts.error', ['name' => 'nomor_hp'])

						<br>

						<label class="form-label" for="alamat">Alamat</label>
                        <input type="text" class="form-control form-control-solid" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" min="0">
                        @include('layouts.error', ['name' => 'alamat'])

						<br>

						<label class="form-label" for="id_user">Email</label>
                        <input type="hidden" name="id_user" id="id_user" value="{{$pelanggan->users->id ?? old('id_user')}}">
                        <input type="text" class="form-control form-control-solid @error('users') is-invalid @enderror" placeholder="Users" id="users" 
                            name="users" value="{{$pelanggan->users->email ?? old('email')}}" aria-label="Users" ariadescribedby="cari" readonly>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</div>
		</div>
		<!-- end::Modal -->
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
</script>

@if(Session::has('success'))
    <script>
        toastr.success(
            'Data berhasil di perbaharui'
        )

    </script>
    @endif

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
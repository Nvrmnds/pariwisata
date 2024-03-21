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
            <form action="{{ route('reservasi.index') }}" method="get">
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" name="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Reservasi" onblur="this.form.submit()">
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
                <a href="{{ route('reservasi.create') }}" class="btn btn-primary">
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
                        Tambah Reservasi
                    </a>
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
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th>Nilai Diskon</th>
                                    <th>Total Bayar</th>
                                    <th>Status Reservasi</th>
                                    <th class="text-end min-w-70px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $reservasi)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td id={{$key+1}}>{{ $reservasi->pelanggan->namaLengkap}}</td>
                                    <td id={{$key+1}}>{{ $reservasi->daftarpaket->nama_paket}}</td>
                                    <td>{{ $reservasi->tglReservasiWisata}}</td>
                                    <td>{{ $reservasi->jumlah_peserta}}</td>
                                    <td>Rp.{{ $reservasi->harga}}</td>
                                    <td>{{ $reservasi->diskon}}%</td>
                                    <td>Rp.{{ $reservasi->nilaiDiskon}}</td>
                                    <td>Rp.{{ $reservasi->totalBayar}}</td>
                                    <td>{{ $reservasi->statusReservasiWisata}}</td>
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
                                                <a href="{{ route('reservasi.edit', $reservasi) }}" class="menu-link px-3" 
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_1">Bayar</a>
                                            </div>
                                            <!--end::Menu item-->
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

    <!-- begin::Modal -->
    <form action="{{route('reservasi.update', $reservasi)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pembayaran</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <label for="fileBuktiTf" class="form-label">Bukti Pembayaran</label>
                    <img src="/img/no-image.png" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <input class="form-control @error('fileBuktiTf') is-invalid @enderror" type="file" id="fileBuktiTf"
                            name="fileBuktiTf" onchange="previewImage()">
                        @error('fileBuktiTf') <span class="textdanger">{{$message}}</span> @enderror
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

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fileBuktiTf").change(function() {
        readURL(this);
        //$('#hasil').show();
    });

    function previewImage() {
    const fileBuktiTf = document.querySelector('#fileBuktiTf');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(fileBuktiTf.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>

@endsection

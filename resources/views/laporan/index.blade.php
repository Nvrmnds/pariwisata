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
            <form action="{{ route('laporan.index') }}" method="get">
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" name="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Laporan Reservasi" onblur="this.form.submit()">
                </div>
            </form>
            <!--end::Search-->
        </div>
        <!-- end::Card title -->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <!--begin::Add customer-->
                <a href="/exportpdf" class="btn btn-primary" target="_blank">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black"/>
                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        Export PDF
                    </a>
                <!-- <a href="{{ route('users.create')}}" class="btn btn-primary">Tambah User</a> -->
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
        </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-5">
        <!-- begin::Filter -->
        <div class="card-body">
            <form method="get" action="{{ route('search') }}" class="form-inline">
                <div class="row">
                    <div class="col">
                        <div class="fv-row">
                            <div class="col">
                                <div class="form-group">
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
                                        <input class="form-control form-control-solid" name="start" placeholder="Tanggal Mulai" id="start"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="fv-row">
                            <div class="col">
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
                                    <input class="form-control form-control-solid" name="end" placeholder="Tanggal Selesai" id="end"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="fv-row">
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control form-select form-select-solid" id="status"
                                        name="status" aria-label="Pilih Status" data-control="select2" data-placeholder="Pilih Status...">
                                        <option value="">Pilih Status...</option>
                                        <option value="pesan">Pesan</option>
                                        <option value="dibayar">Dibayar</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="fv-row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-45px h-45px ps-3">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 z z" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                                            </svg></span>
                                        <!--end::Svg Icon-->    
                                    </button>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end::Filter -->

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
                                    <th>ID Pelanggan</th>
                                    <th>ID Daftar Paket</th>
                                    <th>Tanggal Reservasi Wisata</th>
                                    <th>Harga</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Diskon</th>
                                    <th>Nilai Diskon</th>
                                    <th>Total Bayar</th>
                                    <th>File Bukti Transfer</th>
                                    <th>Status Reservasi Wisata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservasi as $key => $reservasi)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td id={{$key+1}}>{{$reservasi->pelanggan->namaLengkap}}</td>
                                    <td id={{$key+1}}>{{$reservasi->daftarpaket->nama_paket}}</td>
                                    <td>{{$reservasi->tglReservasiWisata}}</td>
                                    <td>Rp.{{$reservasi->harga}}</td>
                                    <td>{{$reservasi->jumlah_peserta}}</td>
                                    <td>{{$reservasi->diskon}}%</td>
                                    <td>Rp.{{$reservasi->nilaiDiskon}}</td>
                                    <td>Rp.{{$reservasi->totalBayar}}</td>
                                    <td class="align-middle">
                                            <div class="d-flex align-items-sm-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-60px symbol-2by2 me-4">
                                                    <div class="symbol-label"
                                                        style="background-image: url('storage/{{$reservasi->fileBuktiTf}}')" alt="{{$reservasi->fileBuktiTf}}">
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                            </div>
                                        </td>
                                    <td>{{$reservasi->statusReservasiWisata}}</td>
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

$("#start").flatpickr({
    enableTime: true,
     dateFormat: "Y-m-d H:i",
});

$("#end").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
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

            document.getElementById('deleteReservasi'+id).submit();

        });
    }
</script>

@endsection

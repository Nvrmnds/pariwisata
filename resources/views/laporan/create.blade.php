<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Reservasi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN DATA RESERVASI</h5>
	</center>
	<table class='table table-bordered'>
		<thead>
    <tr>
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
			@php $i=1 @endphp
			@foreach($exportpdf as $key => $reservasi)
			<tr>
				<td>{{ $i++ }}</td>
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
                            <img src="storage/{{$reservasi->fileBuktiTf}}" alt="{{$reservasi->fileBuktiTf}} tidak ada foto" class="symbol-label" style="width: 50px;">
                        </div>
                        <!--end::Symbol-->
                    </div>
                </td>
				<td>{{$reservasi->statusReservasiWisata}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
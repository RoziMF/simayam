<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
		<h5>Laporan Penjualan</h4>
	</center>
  <br>
  Nama Karyawan : {{$users->name}}
  <br>
  <br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Customer</th>
				<th>Tanggal Pembelian</th>
        <th>Tanggal Pengambilan</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($penjualan as $key=>$value)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$value->nama}}</td>
				<td>{{$value->created_at}}</td>
				<td>{{$value->tglpengambilan}}</td>
				<td>{{$value->kuantitas}}</td>
				<td>@currency($value->harga)</td>
        <td>@currency($value->kuantitas*$value->harga)</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>

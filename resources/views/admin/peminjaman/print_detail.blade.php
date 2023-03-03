@php
    function convertBulan($b){
        if($b == '01'){
            return 'Januari';
        }elseif($b == '02'){
            return 'Februari';
        }elseif($b == '03'){
            return 'Maret';
        }elseif($b == '04'){
            return 'April';
        }elseif($b == '05'){
            return 'Mei';
        }elseif($b == '06'){
            return 'Juni';
        }elseif($b == '07'){
            return 'Juli';
        }elseif($b == '08'){
            return 'Agustus';
        }elseif($b == '09'){
            return 'September';
        }elseif($b == '10'){
            return 'Oktober';
        }elseif($b == '11'){
            return 'November';
        }elseif($b == '12'){
            return 'Desember';
        }
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Data Peminjaman</title>

    <style>
		body {
			padding: 0;
			margin: 0;`
		}

		.page {

			/* margin: 0 auto;' */
			/* position: absolute; */
			/* top: 170px; */
			position: relative;
			top: 25;
		}

		table th,
		table td {
			text-align: left;
		}

		table.layout {
			width: 100%;
			border-collapse: collapse;
		}

		table.display {
			margin: 1em 0;
		}

		table.display th,
		table.display td {
			border: 1px solid #aabebf;
			padding: .5em 1em;
		}

		table.display th {
			background: #93e2d5;
		}

		table.display td {
			background: #fff;
		}

		/* table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }  */

		.customer {
			padding-left: 600px;
		}

		.logo {
			position: absolute;
			left: 0px;
			top: 8px;
			z-index: 999;
		}

		.logo-baru {
			position: absolute;
			right: 0px;
			top: 20px;
			z-index: 999;
		}

		.koplaporan {
			height: 120px;
		}

		.logo img {
			width: 80px;
			height: 80px;

		}

		.logo-baru img {
			width: 120px;
			height: 80px;

		}

		.judul {
			/* position: absolute; */
			top: 0;
			text-align: center;
		}

		.garis {
			/* margin-top: 160px; */
			height: 3px;
			border-top: 3px solid black;
			border-bottom: 1px solid black;
		}

		.info {
			/* position: relative; */

            top: 60px;
			font-size: 20px;
            text-align: center;
		}

		.sub-header {
			font-size: 20px;
		}
	</style>

</head>
<body style="font-size: 13px" onload="window.print()">
	<div class="header">
        <div class="koplaporan">
            <div class="column md-6">
                <div class="logo">
                    <img src="/assets/img/smk.png" style="margin-bottom: 10px">
                </div>
            </div>
            <div class="column md-6">
                <div class="judul">
                    <h2>
                       SMK NEGERI 1 BATIPUH
                    </h2>
                    <div style="margin-top:-1em;margin-bottom:.9em">
                        <span class="sub-header">Alamat : Jl. Raya Padang Panjang – Solok</span><br>
                        <span>Km. 6. 5 Baruah, Kec. Batipuh, Kab. Tanah Datar, Sumbar, 27265</span><br>
                    </div>
                </div>
            </div>

            <div class="garis"></div>
        </div>
	</div>

    <div style="margin-top:30px;">
		<h2><strong><center>LAPORAN DETAIL</center></strong> </h2>
	</div>

	<div class="page">
        <table border="1" style="width: 100%; border-collapse: collapse">
            <thead>
                <tr><th>Nama Peminjam</th><td>{{ ucwords($peminjaman->nama_siswa)}}</td></tr>
                <tr><th>Tanggal Pinjam</th> <td>{{ date('d-m-Y', strtotime( $peminjaman->tanggal_pinjam))}}</td></tr>
                <tr><th>Tanggal Pinjam</th> <td>{{ date('d-m-Y', strtotime( $peminjaman->tanggal_kembali))}}</td></tr>
                {{-- <tr><th>Denda</th> <td>{{$peminjaman->total_denda}}</td></tr> --}}
                <tr><th>Tanggal Pengembalian</th>  <td>{{ date('d-m-Y', strtotime( $peminjaman->tanggal_pengembalian))}}</td></tr>
                <tr><th>Total Denda</th><td> {{$peminjaman->status_buku}}</td></tr>
                <tr><th>Satuan Peminjaman</th><td>{{$peminjaman->status_peminjaman}}</td></tr>
                <tr><th>Total Denda</th><td>{{$denda == null ? '-' : number_format($denda->total_denda)}}</td></tr>
                {{-- <tr><th>Stok</th><td>{{$datas->stok}}</td></tr> --}}
        </thead>
        </table>

        <div class="row">
            <h4 class="card-title">Detail Peminjaman</h4>
            <div class="col-md-12">
                <table border="1" style="width: 100%; border-collapse: collapse">
                    <thead>
                        <th>NIB</th>
                        <th>Judul Buku</th>
                        <th>Kategori Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Lokasi Buku</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $peminjaman->nib }}</td>
                            <td>{{ $peminjaman->judul }}</td>
                            <td>{{ $peminjaman->nama }}</td>
                            <td>{{ $peminjaman->pengarang }}</td>
                            <td>{{ $peminjaman->penerbit }}</td>
                            <td>{{ $peminjaman->lokasi }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

	</div>

</body>

</html>

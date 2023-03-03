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
			top: 20px;
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
<body onload="window.print()">
	<div class="header">
        <div class="koplaporan">
            <div class="column md-6">
                <div class="logo">
                    <img src="/assets/img/smk.png">
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
		<h2><strong><center>LAPORAN PEMINJAMAN</center></strong> </h2>
        <h4>Bulan : {{convertBulan( $bulan) }} <br> Tahun : {{ $tahun }}</h4>
	</div>

	<div class="page">
		<table border="2" class="layout display responsive-table" style="font-size: 18px">
            <thead class="text-center">
                <th>No. </th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
               {{-- <th>Tanggal pengembalian <i class="text-danger">(terlambat)</i></th>
                <th>Status Buku</th>
                <th>Status Peminjaman</th>
                <th>Total Denda</th> --}}
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($item->nama_siswa) }}</td>
                    <td>{{ $item->judul }}</td>
                    <td style="text-align: center">{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                    <td style="text-align: center">{{ date('d-m-Y', strtotime($item->tanggal_kembali)) }}</td>
                    {{-- <td style="text-align: center">{{$item->tanggal_pengembalian==null ? '-' :  date('d-m-Y', strtotime($item->tanggal_pengembalian)) }} <br>
                     {{ $item->terlambat == null ? '' : $item->terlambat }}
                    </td>
                    <td style="text-align: center"><span class="badge bg-primary">{{ $item->status_buku }}</span> </td>
                    <td style="text-align: center"><span class="badge bg-primary">{{ $item->status_peminjaman }}</span> </td>
                    <td>{{ number_format($item->total_denda) }}</td>
                    @php
                        $total += $item->total_denda;
                    @endphp
                </tr>

                <tr >
                    <th colspan="7" style="font-size: 20px;text-align: center">TOTAL DENDA</th>
                    <th colspan="2" style="font-size: 20px;text-align: center">Rp. {{ number_format($total) }}</th>
                </tr> --}}
                @endforeach
            </tbody>

		</table>

	</div>

</body>

</html>

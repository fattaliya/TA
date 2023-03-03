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
		<h2><strong><center>LAPORAN BUKU TAMU</center></strong>
            @if ($s == 'null')
                <h5 style="text-align: center">{{ date('d-m-Y', strtotime($m)) }}</h5>
                @else
                <h5 style="text-align: center">{{ date('d-m-Y', strtotime($m)) }} s/d {{ date('d-m-Y', strtotime($s)) }}</h5>
            @endif
        </h2>

	</div>

	<div class="page">
        <table border="2" style="width: 100%; border-collapse: collapse">
            <thead >
                <th style="text-align: center">No. </th>
                <th style="text-align: center">Nama</th>
                <th style="text-align: center">Kelas</th>
                <th style="text-align: center">Jurusan</th>
                <th style="text-align: center">Jenis Kelamin</th>
                <th style="text-align: center">Tanggal - Jam</th>
            </thead>
            <tbody>
                 @foreach ($tamu as $i)
                 <tr>
                     <td style="text-align: center">{{ $loop->iteration }}</td>
                     <td>{{ $i->nama }}</td>
                     <td style="text-align: center">{{ $i->kelas }}</td>
                     <td>{{ $i->nama_jurusan }}</td>
                     <td style="text-align: center">{{ $i->jenis_kelamin }}</td>
                     <td style="text-align: center">{{ date('d-m-Y', strtotime($i->tgl_tamu)). ' - '.date('H:i', strtotime($i->tgl_tamu)) }}</td>
                 </tr>
                 @endforeach
            </tbody>
        </table>

	</div>

</body>

</html>

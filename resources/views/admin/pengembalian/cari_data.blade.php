<div class="card">
    <div class="card-header">
        <a target="_blank" href="{{ route('pengembalian.print', ['id_siswa' => $id_siswa, 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-success" style="float: right"> Print Data</a>
        <h4>Data Pengembalian</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="text-center">
                <th>No. </th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Tanggal pengembalian <i class="text-danger">(terlambat)</i></th>
                <th>Status Buku</th>
                <th>Status Peminjaman</th>
                <th>Total Denda</th>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($pengembalian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($item->nama_siswa) }}</td>
                    <td>{{ $item->judul }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal_kembali)) }}</td>
                    <td class="text-center">{{$item->tanggal_pengembalian==null ? '-' :  date('d-m-Y', strtotime($item->tanggal_pengembalian)) }} <br>
                     {{ $item->terlambat == null ? '' : $item->terlambat }}
                    </td>
                    <td class="text-center"><span class="badge bg-primary">{{ $item->status_buku }}</span> </td>
                    <td class="text-center"><span class="badge bg-primary">{{ $item->status_peminjaman }}</span> </td>
                    <td>{{ number_format($item->total_denda) }}</td>
                    @php
                        $total += $item->total_denda;
                    @endphp
                </tr>
                @endforeach
                <tr >
                    <th colspan="7" class="text-center text-primary" style="font-size: 20px">TOTAL DENDA</th>
                    <th class="text-primary" style="font-size: 20px">Rp. {{ number_format($total) }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

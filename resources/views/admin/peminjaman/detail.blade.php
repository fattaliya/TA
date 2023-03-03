@extends('admin.layouts.app', [
    'activePage' => 'master',
  ])
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <a target="_blank" href="/admin/peminjaman/print/{{ $peminjaman->id }}" class="btn btn-success" class="float:right">Print Detail</a>
                    </div>
                    <div class="col-md-11">
                            <table class="table" width="100%" cellspacing="0">
                            <thead>
                                <tr><th>Nama Peminjam</th><td>{{ ucwords($peminjaman->nama_siswa)}}</td></tr>
                                <tr><th>Tanggal Pinjam</th> <td>{{ date('d-m-Y', strtotime( $peminjaman->tanggal_pinjam))}}</td></tr>
                                <tr><th>Tanggal Pinjam</th> <td>{{ date('d-m-Y', strtotime( $peminjaman->tanggal_kembali))}}</td></tr>
                {{-- <tr><th>Denda</th> <td>{{$peminjaman->total_denda}}</td></tr> --}}
                                <tr><th>Tanggal Pengembalian</th>  <td>{{ date('d-m-Y', strtotime( $peminjaman->tanggal_pengembalian))}}</td></tr>
                                <tr><th>Total Denda</th><td>
                                    <span class="badge bg-primary">{{$peminjaman->status_buku}}</span>
                                    </td></tr>
                                <tr><th>Satuan Peminjaman</th><td>
                                    <span class="badge bg-primary">{{$peminjaman->status_peminjaman}}</span>
                                    </td></tr>
                                <tr><th>Total Denda</th><td>{{$denda == null ? '-' : number_format($denda->total_denda)}}</td></tr>
                                {{-- <tr><th>Stok</th><td>{{$datas->stok}}</td></tr> --}}
                        </thead>
                        </table>
                </div>
                <hr>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <h4 class="card-title">Detail Peminjaman</h4>
            <div class="col-md-12">
                <table class="table">
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
                            <td>
                                <span class="badge bg-primary"> {{ $peminjaman->nib }}</span>
                               </td>
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
</div>
@endsection

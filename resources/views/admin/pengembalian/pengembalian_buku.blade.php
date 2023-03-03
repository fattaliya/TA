

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

<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">List Data Pengembalian</h4>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
                </div>
              </div>
            </div>


@endsection

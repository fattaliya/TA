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
                <table class="table table-striped" id="table">
                    <div class="card">
                        <div class="card-header">
                        <h4> Filter Buku Tamu</h4>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="" method="get">
                                    <div class="col-md-4">
                                        <label for="label">Mulai Tanggal</label>
                                        <input type="date" name="m" id="" class="form-control" required value="{{ isset($_GET['m']) ? $_GET['m'] : '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="label">Sampai Tanggal ( <small class="text-danger">abaikan jika ingin filter 1 hari</small> )</label>
                                        <input type="date" name="s" id="" class="form-control" value="{{ isset($_GET['s']) ? $_GET['s'] : '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Cek Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>


    @if (isset($_GET['m']))
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <a target="_blank" href="{{ route('buku.tamu.print', ['m' => $_GET['m'] , 's' => $_GET['s']== '' ? 'null' : $_GET['s'] ]) }}" class="btn btn-success" style="float: right"> Print Data</a>
                    <h4>Data Buku Tamu</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead class="text-center">
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal - Jam</th>
                        </thead>
                        <tbody>
                            @php
                            if($_GET['s'] == ''){
                                $tamu = DB::table('tamu')->join('jurusans', 'tamu.id_jurusan', '=', 'jurusans.id')
                                ->whereDate('tamu.tgl_tamu', $_GET['m'])
                                ->get();
                            }else{
                                $tamu = DB::table('tamu')->join('jurusans', 'tamu.id_jurusan', '=', 'jurusans.id')
                                ->whereBetween('tamu.tgl_tamu', [$_GET['m'], $_GET['s']] )
                                ->get();
                            }
                            @endphp
                             @foreach ($tamu as $i)
                             <tr>
                                 <td class="text-center">{{ $loop->iteration }}</td>
                                 <td>{{ $i->nama }}</td>
                                 <td class="text-center">{{ $i->kelas }}</td>
                                 <td>{{ $i->nama_jurusan }}</td>
                                 <td class="text-center">{{ $i->jenis_kelamin }}</td>
                                 <td class="text-center">{{ date('d-m-Y', strtotime($i->tgl_tamu)). ' - '.date('H:i', strtotime($i->tgl_tamu)) }}</td>
                             </tr>
                             @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection

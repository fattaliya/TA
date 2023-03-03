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
                                <div class="col-md-11">
                                    {{-- <h2 class="card-title text-primary">List Data Anggota</h2> --}}
                                    {{-- <a href="/admin/data_siswa/print_data_anggota" class="btn btn-md btn-block btn-success"><i class="fa fa-print"></i> Print</a> --}}
                                    <div class="col card-header text-right">
                                        <form action="/admin/data_siswa/cari" method="GET">
                                            <input type="text" name="cari" placeholder="Cari Nama Anggota .." value="{{ old('cari') }}">
                                            <input type="submit" value="cari">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-auto">
                            </div>

                          <hr>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Data Anggota</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>nis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status Akun</th>
                                    <th>No WA</th>
                                    <th>Kelas</th>

                                    {{-- <th>Foto</th> --}}

                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                                <?php $no = 1; ?>
                                @foreach($data_siswa as $data)
                                <?php

                                  $jurusan = DB::table('jurusans')->find($data->id_jurusan);

                                ?>

                                <tr>

                                    <td>{{$no++}}</td>
                                    {{-- <td>
                                        {{-- @if($data->status_akun == 1)
                                            <a href="{{url('/admin/data_siswa/status_akun/' .$data->id)}}" class="btn btn-sm btn-danger">Non-Aktifkan</a>
                                        @else
                                        <a href="{{url('/admin/data_siswa/status_akun/' .$data->id)}}" class="btn btn-sm btn-success">Aktifkan</a>
                                        @endif
                                </td> --}}
                                    <td>{{$data->nis}}</td>
                                    <td>{{$data->nama_siswa}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    <td>{{$data->status_akun}}</td>
                                    <td>{{$data->no_wa}}</td>
                                    <td>{{$data->kelas}}</td>
                                    {{-- <td>{{$data->status_akun}}</td> --}}
                                    <td>{{DB::table('jurusans')->where('id',$data->id_jurusan)->value('nama_jurusan')}}</td>

                                    {{-- <td><label class="label label-success"> {{ ($data->status_akun == 1) ? 'Aktif' : 'Tidak Aktif'}}</label></td> --}}
                                    {{-- <td>
                                      <img src="/foto/{{$data->foto}}" alt="{{$data->foto}}" width="200"/>
                                    </td> --}}

                                </tr>
                                @endforeach
                            </table>
                            {{ $data_siswa->links() }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

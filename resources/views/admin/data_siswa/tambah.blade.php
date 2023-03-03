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
                                    <h2 class="card-title text-primary">Tambah Data Siswa</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/data_siswa" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/data_siswa/create" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>NIS</label>
                                    <input type="text" name="nis" autofocus class="form-control" place_holder="Masukan Jumlah data_siswa..." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa" class="form-control" place_holder="Masukan Nama data_siswa...." value="">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Jenis Kelamin</label><br>
                                    <input type ="radio" name="jenis_kelamin" value="Laki-Laki">Laki-Laki<br>
                                    <input type ="radio" name="jenis_kelamin" value="Perempuan">Perempuan<br>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <input type="text" name="status_akun" class="form-control" place_holder="Masukan Nama data_siswa...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>No WA</label>
                                    <input type="text" name="no_wa" class="form-control" place_holder="Masukan Nama data_siswa...." value="">
                                </div>


                                <div class="form-group mb-3">
                                    <label>Kelas</label>
                                    <textarea type="text" name="kelas" class="form-control"  placeholder="Pesan"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jurusan</label>
                                    <select class="form-control" name="id_jurusan" required>
                                      <option value="">-- Pilih Jurusan --</option>
                                      @foreach(\DB::table('jurusans')->get() as $data)
                                      <option value="{{$data->id}}">{{$data->nama_jurusan}}</option>
                                      @endforeach
                                    </select>
                                 </div>
                                {{-- <div class="form-group mb-3">
                                  <label>Foto</label>
                                  <input type="file" name="foto" class="form-control" place_holder="Masukan Foto...." value="">
                              </div> --}}
                                <br>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

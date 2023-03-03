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
                                    <h2 class="card-title text-primary">Tambah Data Peminjaman</h2>
                                </div>
                                <div class="col-md-1">
                                    <a href="/admin/peminjaman" class="btn btn-md btn-block btn-primary"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                          <hr>
                          <form action="/admin/peminjaman/create" method="POST">
                                @csrf

                            {{-- <script src="https://unpkg.com/html-qrcode" type="text/javascript"></script> --}}

                                <div class="form-group mb-3">
                                    <label>Nama Peminjam</label>
                                    <select class="form-control" name="id_siswa" required>
                                    <option value="">-- Pilih Siswa --</option>
                                     @foreach(DB::table('data_siswas')->where('status_akun','=','aktif')->where('status_akun','=','Aktif')->get() as $data)
                                      <option value="{{$data->id}}">{{$data->nama_siswa}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" name="tanggal_kembali" class="form-control" place_holder="Masukan Judul peminjaman...." value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Buku</label>
                                    <select class="form-control" name="id_buku" required>
                                      <option value="">-- Pilih Buku --</option>
                                      @foreach($buku as $data)
                                      <option value="{{$data->id}}">{{$data->judul}}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div id="reader" widht="600px"></div>
                                <br>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>

                            </div>
                        </form>

                        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
                        <script>
                        function onScanSuccess(decodedText, decodedResult) {
                            // Handle on success condition with the decoded text or result.
                            console.log(`Code metched: ${decodedText}`, decodedResult);
                        }

                        function onScanError(errorMessage) {
                            // handle on error condition, with error message
                            console.ware('Code Scan error = ${error}');
                        }

                        let html5QrcodeScanner = new Html5QrcodeScanner(
                            "reader",
                            {
                                fps: 10, qrbox : { width: 250, height: 250}},
                                /* verbose = */ false);
                                html5QrcodeScanner.render(onScanSuccess, onScanfailure);
                            </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection



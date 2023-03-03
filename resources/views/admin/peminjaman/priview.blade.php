

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







                        
                          <hr>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">List Data Peminjaman</h4>
                    <div class="table-responsive" >
                      <table class="table table-striped" id="table_peminjaman">
                         <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>BUKU</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                                <?php $no = 1; ?>
                                @foreach($data as $datas)
                                <?php
                                  $buku = DB::table('bukus')->find($datas->id_buku);
                                ?>
                                <tr>
                                    <td>{{$no++}}</td>
                                    {{-- <td>{{$data->id_siswa}}</td> --}}
                                    <td>{{DB::table('data_siswas')->where('id',$datas->id_siswa)->value('nama_siswa')}}</td>
                                    <td>{{DB::table('bukus')->where('id',$datas->id_buku)->value('judul')}}</td>
                                    <td>{{$datas->tanggal_pinjam}}</td>
                                    <td>{{$datas->tanggal_kembali}}</td>
                                    <td>{{$datas->tanggal_pengembalian}}</td>
                                    {{-- <td>{{$data->status_buku}}</td>
                                    <td>{{$data->status_peminjaman}} --}}


                                </tr>
                                @endforeach
                            </table><br>

                            </div>
                        </div>
                      </div>
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
@section('script')
    <script>
        function functionpdf(){
            window.print();

        }
        $("#table_peminjaman").DataTable();

    //     function printableDiv(printableAreaDivId) {
    //  var printContents = document.getElementById(printableAreaDivId).innerHTML;
    //  var originalContents = document.body.innerHTML;

    //  document.body.innerHTML = printContents;

    //  window.print();

    //  document.body.innerHTML = originalContents;
}


    </script>
    <script> src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"</script>
    <script>src="http://www.position-absolute/creation/print/jquery.printPage.js" </script>
@endsection

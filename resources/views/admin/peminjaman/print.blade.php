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
                                  </div>
                                    <div class="section-body">
                                     <div class="row">
                                       <div class="col-12 col-md-12 col-lg-12">


                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">

                                                              <table class="table table-striped" id="table">
                                                                 <thead>


                        </thead>
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                              <h4> Data Pendaftaran Per Periode</h4>
                                                                            </div>
                                                                                <div class="card-body">
                                                                                    <div class="input-group mb-3">
                                                                                        <label for="label">Tanggal Awal</label>
                                                                                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                                                                    </div>
                                                                                    <div class="input-group mb-3">
                                                                                        <label for="label">Tanggal Akhir</label>
                                                                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                                                                    </div>
                                                                                    <div class="input-group mb-3">
                                                                                        <a href="" onclick="this.href='/admin/peminjaman/reportPeminjaman/'+document.getElementById('tglawal').value +
                                                                                        '/' +document.getElementById('tglakhir').value "
                                                                                        " target="blank" class="btn btn-info col-md-12"><i
                                                                                            class="fas fa-print"></i> Print Laporan Per tanggal</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                <br>
                                {{-- <div class="col-md-11">
                                    Silakan Cetak Laporan Peminjaman  <a href="/admin/peminjaman/caritgl" class="btn btn-md btn-block btn-success"><i class="fa fa-print"></i> Print</a>
                            </div> --}}

                            {{-- <div class="col-auto">
                                <div class="col card-header text-right">
                                <form action="/admin/data_siswa/caritgl" method="GET">
                                    {{-- <input type="text" name="" placeholder="Cari Nama Anggota .." value="{{ old('caritgl') }}"> --}}
                                    {{-- <input type="submit" value="caritgl"> --}}
                                {{-- </form> --}}
                            {{-- </div> --}}
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

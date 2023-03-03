@extends('admin.layouts.app', [
    'activePage' => 'dashboard',
  ])
@section('content')

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-body">
                            <img
                            src="../assets/img/icons/unicons/cc-warning.png"
                            alt="chart success"
                            class="rounded"
                          />
                          <br>
                          <br>
                        <span class="fw-semibold d-block mb-1"><h3>Jumlah Peminjaman Tahun ini ( {{ date('Y') }} )</h3></span>
                        {{-- {{$peminjaman->total_peminjaman}} --}}
                        <h1>{{ $peminjaman }}</h1>

                        <h3 class="card-title mb-8"></h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-body">
                            <img
                            src="../assets/img/icons/unicons/cc-success.png"
                            alt="chart success"
                            class="rounded"
                          />

                          <br>
                          <br>
                        <span class="fw-semibold d-block mb-1"><h3>Jumlah Data Buku</h3></span>
                        {{-- {{$buku->total_buku}} --}}
                        <h1>{{ $buku }}</h1>
                        <h3 class="card-title mb-8"></h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-body">
                            <img
                            src="../assets/img/icons/unicons/cc-primary.png"
                            alt="chart success"
                            class="rounded"
                          />

                          <br>
                          <br>
                        <span class="fw-semibold d-block mb-1"><h3>Jumlah Data Siswa</h3></span>
                        {{-- {{$data_siswa->total_data_siswa}} --}}
                        <h1>{{ $siswa }}</h1>
                        <h3 class="card-title mb-8"></h3>
                        {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
@endsection

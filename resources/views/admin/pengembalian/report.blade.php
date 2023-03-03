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
                        <h4> Laporan Pengembalian</h4>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" mb-3">
                                        <label for="label">Siswa</label>
                                        <select onchange="getJurusan()" name="id_siswa" id="id_siswa" class="form-control" >
                                            <option value="">--pilih siswa--</option>
                                            @foreach ($siswa as $item)
                                                <option value="{{ $item->id }}">{{ ucwords($item->nama_siswa) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul>
                                                <li><h5 id="isiJurusan" class="text-primary ">JURUSAN SISWA : </h5></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="label">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="label">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        @php
                                            $y = 2020;
                                        @endphp
                                        @for ($i = $y; $i < date('Y') + 5; $i++)
                                        <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button onclick="cekData()" class="btn btn-primary">Cek Data</button>
                                </div>
                            </div>

                            {{-- <div class="input-group mb-3">
                                <a href="" onclick="this.href='/admin/peminjaman/reportPeminjaman/'+document.getElementById('tglawal').value +
                                '/' +document.getElementById('tglakhir').value "
                                " target="blank" class="btn btn-info col-md-12"><i
                                    class="fas fa-print"></i> Print Laporan Per tanggal</a>
                            </div> --}}

                        </div>
                    </div>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-md-12" id="isiData">

        </div>
    </div>
</div>

@push('js')
    <script>
        function getJurusan(){
            $('#isiJurusan').html('');
            var id_siswa = $('#id_siswa').val();
            if(id_siswa != ''){
                $.post("{{ route('get.jurusan') }}", {id_siswa:id_siswa},
                    function (data, textStatus, jqXHR) {
                        if(data.status == 'ok'){
                            $('#isiJurusan').html(`<h5 id="isiJurusan" class="text-primary">JURUSAN SISWA : ${data.jurusan.toUpperCase()}</h5>`);
                        }
                    },
                    "json"
                );
            }else{
                $('#isiJurusan').html(`<h5 id="isiJurusan" class="text-primary">JURUSAN SISWA:</h5>`);
            }
        }

        function cekData(){
            $('#isiData').html('');
            var id_siswa = $('#id_siswa').val();
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();

            if(id_siswa != ''){
                $('#isiData').append(`<h5 class="text-center text-danger"><i >Processing...</i></h5>`);
                setTimeout(() => {
                    var url = "{{ url('/admin/pengembalian/cari-data') }}/"+id_siswa+"/"+bulan+"/"+tahun;
                    $('#isiData').load(url);
                }, 1000);
            }else{
                alert('Harap Pilih siswa Terlebih Dahulu');
            }
        }
    </script>
@endpush
@endsection

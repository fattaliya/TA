<!doctype html>
<html lang="en">
  <head>
  	<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">

	{{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/home/ionicons/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>

	<nav class="navbar navbar-expand-lg navbar-detached navbar-dark" style="background-color:#001746;">
		<div class="container">
		<a class="navbar-brand" href="{{ route('index') }}">
			<img src="assets/img/logos/smk.png" width="40" alt="logo"  class="mb-0 font-sans-serif fw-bold fs-md-5 fs-lg-1">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
			<li class="navbar-brand nav-item">
			  <a class="nav-link" href="{{ route('login') }}">SMK NEGERI 1 BATIPUH</a>
			</li>
		  </ul>
		  <ul class="nav navbar-nav ml-auto">
			@guest
			 {{-- <li class="nav-item">
			  <a href="{{url('/masuk')}}" class="btn btn-outline-success"> </a>
			</li> --}}
			{{-- <li class="nav-item">
                <a href="{{url('/register')}}" class="btn btn-outline-success">Register </a>
			</li> --}}
            <li class="nav-item">
                <a href="{{url('/login')}}" class="btn btn-outline-success">Login </a>
              </li>




			@else
			<li class="nav-item dropdown">
			  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->name }}
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a href="/admin" class="dropdown-item">Dashboard</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				  @csrf
				</form>
			  </div>
			</li>
			@endguest

		  </ul>
		</div>
	</div>
	</nav>


	<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4 text-center">Pencarian Buku</h1>
          <p class="lead text-center">Kamu bisa mencari Buku apapun yang kamu mau.</p>
          <div class="input-group mb-3">
              {{-- <input type="text" class="typeahead form-control" name="cari" placeholder="Cari Buku"> --}}
              <input class="typeahead form-control" type="text" placeholder="Ketikkan Kategori Buku Pilihan Anda...">
              <div class="input-group-append">
                  <button class="btn btn-primary" onclick="cari()"># Temukan Pencarian Anda... </button>
                </div>

            </div>
            <ul>
                <li>
                    <small class="text-primary">Awali Pencarian dengan Kata Buku, Misal : Buku Pelajaran, Buku Teknologi, dll...</small>
                </li>
            </ul>

        </div>
      </div>

		<section class="ftco-section">
			<div class="container">
                <div class="row">
                    <div class="col-md-12" id="tampilBuku" >
                    </div>
                </div>
                <hr>
				<div class="row mb-5">
					<div class="col-md-12">
						<h5 class=" mb-2">Koleksi sering dipinjam</h5>
                        <br>
					</div>
					<div class="col-md-12">
                        @php

                    @endphp
						<div class="featured-carousel owl-carousel">

							@foreach($pinjam as $data)
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/foto/{{$data->foto}});">
										<div class="text w-100">
											<span class="cat" style="font-size: 8px">{{ucwords($data->nama)}}</span>
											<h3><a href="#">{{$data->judul}}</a></h3>
											<h4>Stok : <b>{{$data->stok}}</b></h4>
                                            <h4>Lokasi : <b>{{$data->lokasi}}</b></h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
                <hr>
				<div class="row bg-light">
					<div class="col-md-12">
						<h5 class=" mb-2">Koleksi terbaru</h5>
					</div>
					<div class="col-md-12">
                        {{-- @php

                    @endphp --}}
						<div class="featured-carousel owl-carousel">
							@foreach($buku_terbaru as $b)
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/foto/{{$b->foto}});">
										<div class="text w-100">
											<span class="cat" style="font-size: 8px">{{$b->nama}}</span>
											<h3><a href="#">{{$b->judul}}</a></h3>
											<h4>Stok : <b>{{$data->stok}}</b></h4>
                                            <h4>Lokasi : <b>{{$data->lokasi}}</b></h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
                <hr>
                <div class="row bg-light">
					<div class="col-md-12">
						<h5 class=" mb-2">Daftar Buku Tamu Hari ini ( {{ date('d-m-Y') }} )</h5>
					</div>

                    <div class="col-md-12" style="background-color: #ebedf0;padding:50px;border-radius: 20px">
						<table class="table table-hover table-striped">
                            <thead>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal - Jam</th>
                            </thead>
                            <tbody>
                                @foreach ($tamu as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->nama }}</td>
                                    <td>{{ $i->kelas }}</td>
                                    <td>{{ $i->nama_jurusan }}</td>
                                    <td>{{ $i->jenis_kelamin }}</td>
                                    <td>{{ date('d-m-Y', strtotime($i->tgl_tamu)). ' - '.date('H:i', strtotime($i->tgl_tamu)) }} WIB</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
					</div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buku Tamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <div id="pesan">
                            <i>Apakah Anda Sudah Mengisi Buku Tamu??</i>
                            <button type="button" id="cek" class="btn btn-sm btn-danger">Belum</button>
                            <button type="button" class="btn btn-sm btn-primary"  data-dismiss="modal">Sudah</button>
                        </div>
                        <div id="myForm" style="display: none">
                        <p>- Harap Mengisi Buku tamu untuk data kunjungan Anda</p>

                            <form action="{{ route('post.tamu') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <select name="kelas" id="" class="form-control" required>
                                        <option value="">---pilih kelas---</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jurusan</label>
                                    <select name="id_jurusan" id="" class="form-control" required>
                                        <option value="">---pilih jurusan---</option>
                                        @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-control" required>
                                        <option value="">---pilih jenis kelamin---</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
			</div>
		</section>
    {{-- <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script> --}}


    <script src="{{ asset('assets/home/js/popper.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#exampleModal').modal();

            $('#cek').click(function(e){
                e.preventDefault();
                $('#myForm').toggle();
                $('#pesan').hide();
            })
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif
    <script type="text/javascript">
        var path = "{{ url('search-auto-db') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });

        function cari(){

            var kategori = $('input.typeahead').val();

            if(kategori == ''){
                alert('ketikkan kategori buku terlebih dahulu')
            }else{
                $('#tampilBuku').html('');
                $('#tampilBuku').append('<h5 class="text-danger text-center" style="font-weight: 600;font-size: 13px">Loading Data...</h5>');
                var q = kategori.replace(/ /g, '-');
                var url = "{{ url('/cari-buku') }}/"+q;
                setTimeout(() => {
                    $('#tampilBuku').html('');
                    $('#tampilBuku').load(url);
                }, 1000);
            }
        }
    </script>
  </body>
</html>

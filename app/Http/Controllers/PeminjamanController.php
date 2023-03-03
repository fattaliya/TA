<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Buku;
use DateTime;
use App\DataSiswa;

class PeminjamanController extends Controller
{
    public function read()
    {
        $peminjaman = DB::table('peminjamen')->where('status_peminjaman', '!=', 'Telah Dikembalikan')->orderBy('id', 'DESC')->get();
        return view('admin.peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    public function add()
    {

        $tgl = now();
        // $today = today();
        $tgl2 = $tgl->format('Y-m-d');
        $buku = buku::whereNotNull('id_kategori')->where('ketersedian', '>', 0)->get();
        $data_siswa = DB::table('data_siswas')->where('status_akun', '=', 'Aktif')->where('status_akun', '=', 'aktif')->orderBy('nama_siswa')->get();
        //     $data_siswa = DB::table('data_siswas')->join('peminjamen','peminjamen.id_siswa','=','siswas.id')
        // ->select(DB::raw('count(*) as tanggal_pinjam, tgl_pinjam'),'nama_siswa','id','nis','jenis_kelamin','status_akun','no_wa','id_jurusan','kelas')
        // ->where('tgl_pinjam', $tgl2)
        // ->where('status_akun','=','aktif')
        // ->where('status_akun','=','Aktif')
        // ->groupBy('nama_siswa')
        // ->get();
        return view('admin.peminjaman.tambah', ['buku' => $buku, 'data_siswa' => $data_siswa]);
    }

    // public function reportPeminjaman()
    // {


    //     if ($request->tahun) {
    //         $tgl = date('Y-m-d', strtotime($request->tahun.'-'. $request->bulan));
    //     }

    //     $tahun = date('Y', strtotime($tgl));
    //     $bulan = date('m', strtotime($tgl));


    //     $peminjaman = DB::table('peminjamen')->where('tgl_lahir', 'like',  $tahun . '-' . $bulan . '%')->orderBy('id','DESC')->get();
    //     return view('admin/peminjaman/reportPeminjaman', compact('peminjaman'));
    // }

    // public function print()
    // {
    // $url = $request->laporan;
    // $tahun = $request->tahun;
    // $bulan = $request->bulan;

    // return redirect($url.'?tahun='.$tahun.'&bulan='.$bulan);


    //     $peminjaman = DB::table('peminjamen')->orderBy('id','DESC')->get();
    //     return view('admin/peminjaman/print', compact('peminjaman'));
    // }

    public function pengembalian_buku()
    {
        // $pengembalian = DB::table('peminjamen')->where('status_peminjaman', 'Telah Dikembalikan')->orderBy('id', 'DESC')->get();
        $pengembalian = DB::table('peminjamen')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->leftJoin('dendas', 'peminjamen.id', '=', 'dendas.id_peminjaman')
            ->where('peminjamen.status_peminjaman', 'Telah Dikembalikan')
            ->get();
        return view('admin.pengembalian.pengembalian_buku', ['pengembalian' => $pengembalian]);
    }

    public function print()
    {
        return view('admin/peminjaman/print');
    }

    public function report()
    {
        $siswa = DB::table('data_siswas')->get();
        return view('admin/peminjaman/report', compact('siswa'));
    }

    public function getJurusan(Request $request)
    {
        $jurusan = DB::table('data_siswas')
            ->join('jurusans', 'data_siswas.id_jurusan', '=', 'jurusans.id')
            ->where('data_siswas.id', $request->id_siswa)
            ->value('nama_jurusan');

        $data = [
            'status' => 'ok',
            'jurusan' => $jurusan,
        ];

        return response()->json($data);
    }

    public function cari_data($id_siswa, $bulan, $tahun)
    {

        $peminjaman = DB::table('peminjamen')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->leftJoin('dendas', 'peminjamen.id', '=', 'dendas.id_peminjaman')
            ->where('peminjamen.id_siswa', $id_siswa)
            ->whereMonth('peminjamen.tanggal_pinjam', $bulan)
            ->whereYear('peminjamen.tanggal_pinjam', $tahun)
            ->get();
        return view('admin/peminjaman/cari_data', compact('peminjaman', 'id_siswa', 'bulan', 'tahun'));
    }

    public function print_laporan($id_siswa, $bulan, $tahun)
    {
        $peminjaman = DB::table('peminjamen')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->leftJoin('dendas', 'peminjamen.id', '=', 'dendas.id_peminjaman')
            ->where('peminjamen.id_siswa', $id_siswa)
            ->whereMonth('peminjamen.tanggal_pinjam', $bulan)
            ->whereYear('peminjamen.tanggal_pinjam', $tahun)
            ->get();

        return view('admin/peminjaman/print_laporan', compact('peminjaman', 'id_siswa', 'bulan', 'tahun'));
    }

    public function pengembalian()
    {
        $siswa = DB::table('data_siswas')->get();
        return view('admin/pengembalian/report', compact('siswa'));
    }

    public function cari_pengembalian($id_siswa, $bulan, $tahun)
    {
        $pengembalian = DB::table('peminjamen')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->leftJoin('dendas', 'peminjamen.id', '=', 'dendas.id_peminjaman')
            // ->where('peminjamen.status_buku', 'Telah DIkembaliakn')
            ->where('peminjamen.id_siswa', $id_siswa)
            ->whereMonth('peminjamen.tanggal_pinjam', $bulan)
            ->whereYear('peminjamen.tanggal_pinjam', $tahun)
            ->get();

        return view('admin/pengembalian/cari_data', compact('pengembalian', 'id_siswa', 'bulan', 'tahun'));
    }

    public function pengembalian_print($id_siswa, $bulan, $tahun)
    {
        $pengembalian = DB::table('peminjamen')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->leftJoin('dendas', 'peminjamen.id', '=', 'dendas.id_peminjaman')
            ->where('peminjamen.status_buku', 'Telah DIkembaliakn')
            ->where('peminjamen.id_siswa', $id_siswa)
            ->whereMonth('peminjamen.tanggal_pinjam', $bulan)
            ->whereYear('peminjamen.tanggal_pinjam', $tahun)
            ->get();

        return view('admin/pengembalian/print_laporan', compact('pengembalian', 'id_siswa', 'bulan', 'tahun'));
    }

    public function reportPeminjaman($tglawal, $tglakhir)
    {

        $peminjaman = DB::table('peminjamen')
            ->join('data_siswa', 'peminjamen.id_siswa', '=', 'data_siswa.id')
            ->whereBetween('peminjamen.tanggal_pinjam', [$tglawal, $tglakhir])
            ->get;

        return view('admin/peminjaman/reportPeminjaman', compact('peminjaman'));
    }

    public function create(Request $request)
    {
        // dd($request->all());die();

        $data = Peminjaman::create([
            'id_siswa' => $request['id_siswa'],
            'tanggal_pinjam' => $request['tanggal_pinjam'],
            'tanggal_kembali' => $request['tanggal_kembali'],
            'tanggal_pengembalian' => $request['tanggal_pengembalian'],
            'id_buku' => $request['id_buku'],
            'status_buku' => "-",
            'status_peminjaman' => "-",

            // $data->save()
        ]);

        $sisa_stok = Buku::where('id', $data->id_buku)->get();
        foreach ($sisa_stok as $sisa) {
            $rest = Buku::find($sisa->id);
            $rest->where('id', $data->id_buku)
                ->update([
                    'ketersedian' => ($rest->ketersedian - 1),
                ]);

            $rest->save();
        }
        if ($data) {
            return redirect('/admin/peminjaman')->with("success", "Data Berhasil Ditambah !");
        }
    }

    public function edit($id)
    {

        $peminjaman = DB::table('peminjamen')->where('id', $id)->first();
        $buku = DB::table('bukus')->find($peminjaman->id_buku);
        $bukuAll = DB::table('bukus')->where('id', '!=', $buku->id)->orderBy('id', 'DESC')->get();

        $siswa = DB::table('data_siswas')->where('nama_siswa', $peminjaman->id)->first();
        $siswaAll = DB::table('data_siswas')->where('nama_siswa', '!=', $peminjaman->id_siswa)->orderBy('nama_siswa', 'ASC')->get();

        return view('admin.peminjaman.edit', ['peminjaman' => $peminjaman, 'buku' => $buku, 'bukuAll' => $bukuAll, 'siswa' => $siswa, 'siswaAll' => $siswaAll]);
    }

    public function update(Request $request, $id)
    {


        // $data = peminjaman::update([


        //     'id_siswa' => $request['id_siswa'],
        //     'tanggal_pinjam' =>$request['tanggal_pinjam'],
        //     'tanggal_kembali' => $request['tanggal_kembali'],
        //     'tanggal_pengembalian' => $request['tanggal_pengembalian'],
        //     'id_buku' => $request['id_buku'],
        //     'status_buku' => $request['status_buku'],
        //     'status_peminjaman' => $request['status_peminjaman']

        // ]);

        // $sisa_stok = Buku::where('id',$data->id_buku)->get();
        // foreach ($sisa_stok as $sisa) {
        //     $rest = Buku::find($sisa->id);
        //     $rest->where('id', $data->id_buku)
        //     ->update([
        //         'ketersedian' => ($rest->ketersedian + 1),
        //     ]);

        //     $rest->save();
        // }
        // if($data){
        return redirect('/admin/peminjaman')->with("success", "Data Berhasil Diupdate !");
        // }
    }

    public function delete($id)
    {
        $peminjaman = DB::table('peminjamen')->where('id', $id)->first();
        DB::table('peminjamen')->where('id', $id)->delete();

        return redirect('/admin/peminjaman')->with("success", "Data Berhasil Didelete !");
    }


    public function kembali($data)
    {

        $rest = Peminjaman::find($data);
        $buku = Buku::join('peminjamen', 'peminjamen.id_buku', '=', 'bukus.id')
            ->select('bukus.ketersedian', 'bukus.stok')->where('peminjamen.id', $data)->get();
        foreach ($buku as $book) {
            $ketersediaan = $book->ketersedian;
            $stok = $book->stok;
        }
        $buku_update = Buku::join('peminjamen', 'peminjamen.id_buku', '=', 'bukus.id')
            ->select('bukus.ketersedian', 'bukus.stok')->where('peminjamen.id', $data)
            ->update([
                'bukus.ketersedian' => $ketersediaan + 1,
                'bukus.stok' => $stok + 1
            ]);
        // $update_book = $buku_update->save();
        // dd($ketersediaan);die();
        $rest->where('id', $data)
            ->update([
                'tanggal_pengembalian' => date('Y-m-d'),
                'status_buku' => 'Aman',
                'status_peminjaman' => 'Telah Dikembalikan'
            ]);
        // $books->where()

        $restt = $rest->save();
        if ($restt && $buku_update) {

            return redirect('/admin/peminjaman/')->with("success", "Buku Telah Di kembalikan !");
        } else {
            return redirect('/admin/peminjaman/')->with("gagal", "Buku Telah Di kembalikan !");
        }
    }


    public function getdenda($id)
    {

        $peminjaman = DB::table('peminjamen')->where('id', $id)->first();
        $buku = DB::table('bukus')->where('id', $peminjaman->id_buku)->first();
        $denda = DB::table('kategoris')->where('id', $buku->id_kategori)->first();
        $tgl1 = $peminjaman->tanggal_kembali;
        $tgl11 = new DateTime($tgl1);
        $tgl2 = now();
        // $today = today();
        $tgl22 = $tgl2->format('Y-m-d');
        $interval = $tgl11->diff($tgl2);
        $days = $interval->format('%a');

        return view('admin.peminjaman.denda', ['peminjaman' => $peminjaman, 'tgl' => $tgl22, 'buku' => $buku, 'denda' => $denda, 'days' => $days]);
    }

    public function denda(Request $request)
    {
        $bukuada = DB::table('bukus')->where('id', $request->id_buku)->first();

        DB::table('peminjamen')
            ->where('id', $request->id)
            ->update([
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'status_peminjaman' => "Telah Dikembalikan",
                'status_buku' => "Telat",
            ]);
        DB::table('bukus')
            ->where('id', $request->id_buku)
            ->update([
                'ketersedian' => $bukuada->ketersedian + 1,
            ]);
        DB::table('dendas')
            ->insert([
                'id_peminjaman' => $request->id,
                'jumlah_denda' => 0,
                'total_denda' => $request->total_denda,
                'terlambat' => $request->telat,
            ]);
        return redirect('/admin/peminjaman')->with("success", "Data Berhasil Diupdate !");
    }
    public function getKehilangan($id)
    {
        // dd($id);die();

        $peminjaman = DB::table('peminjamen')->where('id', $id)->first();
        $buku = DB::table('bukus')->where('id', $peminjaman->id_buku)->first();
        $ganti = DB::table('kategoris')->where('id', $buku->id_kategori)->first();

        $tgl = now();
        // $today = today();
        $tgllapor = $tgl->format('Y-m-d');


        $siswa = DB::table('data_siswas')->where('nama_siswa', $peminjaman->id)->first();
        $siswaAll = DB::table('data_siswas')->where('nama_siswa', '!=', $peminjaman->id_siswa)->orderBy('nama_siswa', 'ASC')->get();

        return view('admin.peminjaman.kehilangan', ['peminjaman' => $peminjaman, 'buku' => $buku, 'tgllapor' => $tgllapor, 'kategori' => $ganti]);
    }

    public function kehilangan(Request $request)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time() . '.' . $foto->extension();
            $foto->move(public_path() . '/foto/', $name);
        } else {
            $name = 'tidak ada file.png';
        }
        $bukuada = DB::table('bukus')->where('id', $request->id_buku)->first();
        DB::table('bukus')
            ->where('id', $request->id_buku)
            ->update([
                'stok' => $bukuada->stok - 1
            ]);
        DB::table('peminjamen')
            ->where('id', $request->id)
            ->update([
                'tanggal_pengembalian' => $request->tanggal_lapor,
                'status_peminjaman' => "Telah Dilaporkan",
                'status_buku' => "Hilang",
            ]);
        if ($request->kehilangan == "Buku" || $request->kehilangan == "buku") {
            $insert_pengganti = Buku::create([
                'nib' => 0,
                'id_kategori' => 0,
                'exp' => 0,
                'cnd' => 0,
                'foto' => $name,
                'terima_tanggal' => $request->tanggal_lapor,
                'judul' => $request->pengganti,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tempat_terbit' => $request->tempat_terbit,
                'lokasi' => $request->lokasi,
                'asal_buku' => "Ganti Rugi Buku Hilang",
                'stok' => 1,
                'ketersedian' => 1,
            ]);
            $insert_kehilangan = DB::table('kehilangans')->insert([
                'keterangan' => $request->alasan,
                'informasi' => 0,
                'id_penganti' => $insert_pengganti->id,
                'id_peminjaman' => $request->id,
            ]);
        } else if ($request->kehilangan == "Uang" || $request->kehilangan == "uang") {
            $insert_kehilangan = DB::table('kehilangans')->insert([
                'keterangan' => $request->alasan,
                'informasi' => $request->pengganti,
                'id_penganti' => 0,
                'id_peminjaman' => $request->id,
            ]);
        }
        return redirect('/admin/peminjaman')->with("success", "Data Berhasil Diupdate !");
    }


    public function detail($id)
    {

        $peminjaman = DB::table('peminjamen')
            ->select('peminjamen.*', 'data_siswas.nama_siswa', 'bukus.judul', 'bukus.nib', 'bukus.pengarang', 'bukus.penerbit', 'bukus.lokasi', 'kategoris.nama')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->join('kategoris', 'bukus.id_kategori', '=', 'kategoris.id')
            ->where('peminjamen.id', $id)
            ->first();

        $denda = DB::table('dendas')->where('id_peminjaman', $id)->first();
        return view('admin.peminjaman.detail', ['peminjaman' => $peminjaman, 'denda' => $denda]);
    }

    public function print_detail($id)
    {
        $peminjaman = DB::table('peminjamen')
            ->select('peminjamen.*', 'data_siswas.nama_siswa', 'bukus.judul', 'bukus.nib', 'bukus.pengarang', 'bukus.penerbit', 'bukus.lokasi', 'kategoris.nama')
            ->join('data_siswas', 'peminjamen.id_siswa', '=', 'data_siswas.id')
            ->join('bukus', 'peminjamen.id_buku', '=', 'bukus.id')
            ->join('kategoris', 'bukus.id_kategori', '=', 'kategoris.id')
            ->where('peminjamen.id', $id)
            ->first();

        $denda = DB::table('dendas')->where('id_peminjaman', $id)->first();

        return view('admin.peminjaman.print_detail', ['peminjaman' => $peminjaman, 'denda' => $denda]);
    }
}

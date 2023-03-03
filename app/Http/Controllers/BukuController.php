<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BukuController extends Controller
{


    public function indexdashboard(){
        $peminjaman= DB::table('peminjamen')
                ->select(DB::raw('COUNT(id) as total_peminjaman'))
                ->where('status_peminjaman','=','-')
                ->first();
        $buku= DB::table('bukus')
        ->select(DB::raw('COUNT(id) as total_buku'))
        ->first();
        $data_siswa= DB::table('data_siswas')
        ->select(DB::raw('COUNT(id) as total_data_siswa'))
        ->first();
        // dd($data_siswa);
        // $data= array (
        //     'peminjaman' => $peminjaman,
        //     'pengembalian' => $pengembalian,
        //     'buku'=> $buku,
        //     'data_siswa' => $data_siswa

        // );

        return view('admin/dashboard/index',compact("peminjaman", "buku", "data_siswa"));
    }

    public function read(Request $request)
    {

        if ($request->has('search')) {

            // $buku = Buku::where('judul','like','%'.$request->search.'%');

            $buku = DB::table('bukus')
                ->whereRaw('LOWER(`judul`) LIKE ? ', strtolower($request->search))->get();
        } else {
            $buku = DB::table('bukus')->orderBy('id', 'DESC')->get();
        }

        $buku = DB::table('bukus')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.buku.index', ['buku' => $buku]);
    }

    public function add()
    {

        $kategori = DB::table('kategoris')->orderBy('id', 'DESC')->get();
        return view('admin.buku.tambah', ['kategori' => $kategori]);
    }


    public function print_buku()
    {
        $buku = DB::table('bukus')->orderBy('id', 'DESC')->get();
        return view('admin/buku/print_buku', compact('buku'));
    }

    public function print()
    {
        $buku = DB::table('bukus')->orderBy('id', 'DESC')->get();
        return view('admin/buku/print', compact('buku'));
    }

    public function cetak()
    {
        $buku = DB::table('bukus')->get();
        return view('admin.buku.cetak', ['buku' => $buku]);
    }




    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $buku = DB::table('bukus')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('admin.buku.index', ['buku' => $buku]);
    }


    public function create(Request $request)
    {

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time() . '.' . $foto->extension();
            $foto->move(public_path() . '/foto/', $name);
        } else {
            $name = 'tidak-ada-file.png';
        }
        DB::table('bukus')->insert([
            'nib' => $request->nib,
            'terima_tanggal' => $request->terima_tanggal,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tempat_terbit' => $request->tempat_terbit,
            'exp' => $request->exp,
            'lokasi' => $request->lokasi,
            'asal_buku' => $request->asal_buku,
            'stok' => $request->stok,
            'cnb' => $request->cnb,
            'ketersedian' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'foto' => $name
        ]);

        return redirect('/admin/buku')->with("success", "Data Berhasil Ditambah !");
    }

    public function edit($id)
    {
        $buku = DB::table('bukus')->where('id', $id)->first();

        // $pengarang = DB::table('pengarang')->find($buku->id_pengarang);
        // $pengarangAll = DB::table('pengarang')->where('id','!=',$pengarang->id)->orderBy('id','DESC')->get();

        $kategori = DB::table('kategoris')->find($buku->id_kategori);
        $kategoriAll = DB::table('kategoris')->where('id', '!=', $kategori->id)->orderBy('id', 'DESC')->get();

        // $rak = DB::table('rak')->find($buku->id_rak);
        // $rakAll = DB::table('rak')->where('id','!=',$rak->id)->orderBy('id','DESC')->get();
        return view('admin.buku.edit', [
            'buku' => $buku, 'kategoris' => $kategori,
            'kategoriAll' => $kategoriAll
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->fotoOld;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time() . '.' . $foto->extension();
            $foto->move(public_path() . '/foto/', $name);
        }
        DB::table('bukus')
            ->where('id', $id)
            ->update([
                'nib' => $request->nib,
                'terima_tanggal' => $request->terima_tanggal,
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'lokasi' => $request->lokasi,
                'tempat_terbit' => $request->tempat_terbit,
                'exp' => $request->exp,
                'cnb' => $request->cnb,
                'ketersedian' => $request->ketersedian,
                'asal_buku' => $request->asal_buku,
                'stok' => $request->stok,
                'foto' => $name
            ]);

        return redirect('/admin/buku')->with("success", "Data Berhasil Update !");
    }


    public function delete($id)
    {
        $buku = DB::table('bukus')->where('id', $id)->first();
        DB::table('bukus')->where('id', $id)->delete();

        return redirect('/admin/buku')->with("success", "Data Berhasil Didelete !");
    }
}

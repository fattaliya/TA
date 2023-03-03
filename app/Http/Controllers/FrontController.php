<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tes()
    {
        $pinjam = DB::table('peminjamen')
            ->join('bukus', 'bukus.id', '=', 'peminjamen.id_buku')
            ->join('kategoris', 'kategoris.id', '=', 'peminjamen.id_buku')
            // ->groupBy('peminjamen.id_buku')
            ->get();
        $buku_terbaru = DB::table('bukus')
            ->join('kategoris', 'bukus.id_kategori', '=', 'kategoris.id')
            ->orderBy('bukus.terima_tanggal', 'DESC')->get();

        $jurusan = DB::table('jurusans')->get();
        $tamu = DB::table('tamu')->join('jurusans', 'tamu.id_jurusan', '=', 'jurusans.id')->whereDate('tgl_tamu', date('Y-m-d'))->get();

        return view('template.index', ['pinjam' => $pinjam, 'buku_terbaru' => $buku_terbaru, 'jurusan' => $jurusan, 'tamu' => $tamu]);
    }

    public function tamu(Request $request)
    {
        DB::table('tamu')->insert([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'id_jurusan' => $request->id_jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->back()->with('success', 'Terima Kasih...');
    }
    public function index()
    {

        $categori = Categori::all();

        return view('index', compact('categori'));
    }


    public function cari(Request $request)
    {
        // menangkap data pencarian

        $cari = $request->cari;


        $kategori = DB::table('kategoris')
            ->where('nama ', 'LIKE', '%' . $cari . '%')
            ->paginate(10);
        dd($kategori);
        die();

        return view('admin.kategori.index', ['kategori' => $kategori]);
    }

    public function searchQuery(Request $request)
    {
        // $data = User::select("name")
        //     ->where("name", "LIKE", "%{$request->get('query')}%")
        //     ->get();
        $query = DB::table('kategoris')->select('nama')
            ->where("nama", "LIKE", "%{$request->get('query')}%")
            ->get();

        foreach ($query as $q) {
            $data[] = $q->nama;
        }

        return response()->json($data);
    }

    public function cari_buku($kategori)
    {
        $q = str_replace('-', ' ', $kategori);
        $buku = DB::table('bukus')
            ->join('kategoris', 'bukus.id_kategori', '=', 'kategoris.id')
            ->where("kategoris.nama", "LIKE", "%{$q}%")
            ->get();

        return view('template.cari', compact('buku', 'q'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

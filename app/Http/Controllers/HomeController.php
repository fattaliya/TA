<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $peminjaman = DB::table('peminjamen')->whereYear('tanggal_pinjam', date('Y'))->count();
        $buku = DB::table('bukus')->count();
        $siswa = DB::table('data_siswas')->count();
        return view('admin.dashboard.index', compact('peminjaman', 'buku', 'siswa'));
    }
}

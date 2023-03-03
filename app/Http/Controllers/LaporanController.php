<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function reportPeminjaman()
    {
        $peminjaman = DB::table('peminjamen')->orderBy('id','DESC')->get();
        return view('admin/peminjaman/reportPeminjaman', compact('peminjaman'));
    }

    public function cetak ()
    {
        $url = $request->laporan;
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        return redirect($url.'?tahun='.$tahun.'&bulan='.$bulan);
    }


}

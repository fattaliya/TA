<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuTamuController extends Controller
{
    public function index()
    {
        return view('admin.buku_tamu.index');
    }

    public function print($m, $s)
    {
        if ($s == 'null') {
            $tamu = DB::table('tamu')->join('jurusans', 'tamu.id_jurusan', '=', 'jurusans.id')
                ->whereDate('tamu.tgl_tamu', $m)
                ->get();
        } else {
            $tamu = DB::table('tamu')->join('jurusans', 'tamu.id_jurusan', '=', 'jurusans.id')
                ->whereBetween('tamu.tgl_tamu', [$m, $s])
                ->get();
        }
        return view('admin.buku_tamu.print', compact('tamu', 'm', 's'));
    }
}

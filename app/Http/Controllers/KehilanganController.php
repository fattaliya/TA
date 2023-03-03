<?php

namespace App\Http\Controllers;

use App\Kehilangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KehilanganController extends Controller
{
    public function read(){
        $kehilangan = DB::table('kehilangans')->orderBy('id','DESC')->get();
        return view('admin.kehilangan.index',['kehilangan'=>$kehilangan]);
    }

    public function add(){
    	return view('admin.kehilangan$kehilangan.tambah');
    }

    public function create(Request $request){
        $check = $request->all();
        if($request->kehilangan == "Buku"){
            $request->jumlah=1;
        }
        // dd($request->jumlah);die();

        DB::table('kehilangans')->insert([
            'keterangan' => $request->keterangan,
            'informasi' => $request->informasi,
            'id_penganti' => $request->id_penganti,
            'id_peminjaman' =>$request->id_peminjaman ]);

        return redirect('/admin/kehilangan')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){

        $kehilangan= DB::table('kehilangans')->where('id',$id)->first();
        return view('admin.kehilangan.edit',['kehilangan'=>$kehilangan]);
    }

    public function update(Request $request, $id) {
        DB::table('kehilangans')
            ->where('id', $id)
            ->update([
                'keterangan' => $request->keterangan,
                'informasi' => $request->informasi,
                'id_penganti' => $request->id_penganti,
                'id_peminjaman' =>$request->id_peminjaman ]);

        return redirect('/admin/kehilangan')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $kelas= DB::table('kehilangans')->where('id',$id)->first();
        DB::table('kehilangans')->where('id',$id)->delete();

        return redirect('/admin/kehilangan')->with("success","Data Berhasil Didelete !");
    }
}

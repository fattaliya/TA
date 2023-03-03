<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    public function read(){
        $jurusan = DB::table('jurusans')->orderBy('id','DESC')->get();
        return view('admin.jurusan.index',['jurusan'=>$jurusan]);
    }

    public function add(){

    	return view('admin.jurusan.tambah');
    }

    public function create(Request $request){
        DB::table('jurusans')->insert([

            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect('/admin/jurusan')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){

        $jurusan= DB::table('jurusans')->where('id',$id)->first();
        return view('admin.jurusan.edit',[ 'jurusan' =>$jurusan] );
    }

    public function update(Request $request, $id) {
        DB::table('jurusans')
            ->where('id', $id)
            ->update([
                'nama_jurusan' => $request->nama_jurusan
            ]);

        return redirect('/admin/jurusan')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $jurusan= DB::table('jurusans')->where('id',$id)->first();
        DB::table('jurusans')->where('id',$id)->delete();

        return redirect('/admin/jurusan')->with("success","Data Berhasil Didelete !");
    }
}

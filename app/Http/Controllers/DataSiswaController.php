<?php

namespace App\Http\Controllers;

use App\DataSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\WablasTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use PDF;

class DataSiswaController extends Controller
{
    public function read(){
        $data_siswa = DB::table('data_siswas')->orderBy('id','DESC')->paginate(10);
        return view('admin.data_siswa.index',['data_siswa'=>$data_siswa]);
    }


    public function add(){

        $jurusan = DB::table('jurusans')->orderBy('id','DESC')->get();
    	return view('admin.data_siswa.tambah',['jurusan'=>$jurusan]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;


		$data_siswa = DB::table('data_siswas')
		->where('nama_siswa','like',"%".$cari."%")
		->paginate();


		return view('admin.data_siswa.index',['data_siswa' => $data_siswa]);

	}

    public function print_data_anggota()
    {
        $data_siswa = DB::table('data_siswas')->orderBy('id','DESC')->get();
        return view('admin/data_siswa/print_data_anggota', compact('data_siswa'));
    }


    public function print()
    {
        $data_siswa = DB::table('data_siswas')->orderBy('id','DESC')->get();
        return view('admin/data_siswa/print', compact('data_siswa'));
    }


    public function detail ($nis){
        $data_siswa = DB::table('data_siswas')->where('nis',$nis)->first();
    	return view('admin.data_siswa.detail',['data_siswa'=>$data_siswa]);
    }


    public function create(Request $request){

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
                $name_file = time() . '.' . $foto->extension();
                $foto->move(public_path().'/foto/', $name_file);
        }else{
            $name_file = 'tidak ada file.png';
        }

    $data = DataSiswa::create([
        'nis' => $request['nis'],
        'nama_siswa' =>$request['nama_siswa'],
        'jenis_kelamin' => $request['jenis_kelamin'],
        // 'status' => $request['status'],
        'status_akun' =>$request['status_akun'],
        'no_wa' => $request['no_wa'],
        'id_jurusan' => $request['id_jurusan'],
        'kelas' => $request['kelas'],
        // 'status_akun' =>$request->status_akun,
        'foto' => $name_file
    ]);

        // dd($data);die();
        if($data){
            return redirect('/admin/data_siswa')->withSuccess('success','Data Berhasil Ditambah !');


        }
    }




    public function edit($id){

        $data_siswa= DB::table('data_siswas')->where('id',$id)->first();


        return view('admin.data_siswa.edit',['data_siswa'=>$data_siswa]);
    }

    public function update(Request $request, $id) {

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
                $name = time() . '.' . $foto->extension();
                $foto->move(public_path().'/foto/', $name);
        }else{
            $name = 'tidak ada file.png';
        }
        DB::table('data_siswas')
            ->where('id', $id)
            ->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            // 'id_kelas' => $request->id_kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_wa' =>$request->no_wa,
            'status' => $request->status,
            'id_jurusan' =>$request->id_jurusan,
            'kelas' => $request->kelas,

            'status_akun' =>$request->status_akun,
            'foto' => $name
        ]);
        return redirect('/admin/data_siswa')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $data_siswa= DB::table('data_siswas')->where('id',$id)->first();
        DB::table('data_siswas')->where('id',$id)->delete();

        return redirect('/admin/data_siswa')->with("success","Data Berhasil Didelete !");
    }

    public function konfirmasi($id)
    {
        $data_siswa= DB::table('data_siswas')->where('no_wa',$id)->first();
        DB::table('data_siswas')->where('no_wa',$id)->konfirmasi();

        return redirect('/admin/data_siswa')->with("success","konfirmasi !");
    }


    public function status_akun($id)
    {
        $data_siswa= DB::table('data_siswas')->where('id',$id)->first();

        $status_sekarang = $data_siswa->status_akun;

        if($status_sekarang == 1){
            DB::table('data_siswas')->where('id',$id)->update([
                'status_akun' =>0
            ]);
        }
        else{
        DB::table('data_siswas')->where('id',$id)->update([
            'status_akun' =>1
        ]);
        }
        Session::flash('sukses', "status berhasil di ubah");

        return redirect('/admin/data_siswa');
    }


    public function masuk(Request $request){

          $data = datasiswa::create([
        'nis' => $request['nis'],
        'nama_siswa' =>$request['nama_siswa'],
        'jenis_kelamin' => $request['jenis_kelamin'],
        'status' => $request['status'],
        'no_wa' => $request['no_wa'],
        'id_jurusan' => $request['id_jurusan'],
        'kelas' => $request['kelas'],
        // 'status_akun' =>$request->status_akun,
        // 'foto' => $name_file
    ]);


        if($data){
            return redirect('/admin/data_siswa')->withSuccess('success','Data Berhasil Ditambah !');


        }
    }
}

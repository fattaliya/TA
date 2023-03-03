<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    // protected $table = 'data_siswa';
    protected $fillable =[
    'id', 'nis', 'nama_siswa', 'jenis_kelamin', 'status', 'foto','status_akun','no_wa','id_jurusan','kelas'
];
}

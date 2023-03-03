<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'data_siswa';
    protected $fillable =[
    'id', 'nama_jurusan',
];
}

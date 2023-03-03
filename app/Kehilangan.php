<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehilangan extends Model
{
    protected $table = 'kehilangan';
    protected $fillable =[
    'id',
    'keterangan',
    'informasi',
    'id_penganti',
    'id_peminjaman',
];
}

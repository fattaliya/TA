<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'denda';
    protected $fillable =[
    'id',
    'id_peminjaman',
    'jumlah_denda',
    'total_denda',
    'terlambat',
];
}

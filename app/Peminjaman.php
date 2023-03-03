<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable =[
    'id',
    'id_siswa',
    'tanggal_pinjam',
    'tanggal_kembali',
    'tanggal_pengembalian',
    'id_buku',
    'status_buku',
    'status_peminjaman',
];
}

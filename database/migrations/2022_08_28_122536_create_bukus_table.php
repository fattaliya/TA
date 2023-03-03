<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('nib')->nullable();
            $table->date('terima_tanggal')->nullable();
            $table->text('judul');
            $table->string('id_kategori')->nullable();
            $table->string('pengarang')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('exp')->nullable();
            $table->string('cnb')->nullable();
            $table->string('asal_buku')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('stok')->nullable();
            $table->string('ketersedian')->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}

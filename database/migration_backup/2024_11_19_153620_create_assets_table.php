<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('no_ba_terima');
            $table->date('tgl_ba_terima');
            $table->string('register');
            $table->string('merk');
            $table->string('bahan');
            $table->date('thn_pmbelian');
            $table->string('pabrik');
            $table->string('rangka');
            $table->string('mesin');
            $table->string('polisi');
            $table->string('bpkb');
            $table->bigInteger('harga');
            $table->string('deskripsi_brg');
            $table->string('keterangan');
            $table->string('opd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');

    }
};

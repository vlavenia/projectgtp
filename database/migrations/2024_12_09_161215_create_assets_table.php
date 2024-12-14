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
            $table->string('nama_barang');
            $table->string('kode_barang')->nullable();
            // $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('objek_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('asal_id')->nullable();
            $table->text('img_url')->nullable();
            $table->string('no_ba_terima')->nullable();
            $table->date('tgl_ba_terima')->nullable();
            $table->string('no_register')->nullable();
            $table->string('merk')->nullable();
            $table->string('bahan')->nullable();
            $table->year('thn_pmbelian')->nullable();
            $table->string('pabrik')->nullable();
            $table->string('rangka')->nullable();
            $table->string('mesin')->nullable();
            $table->string('polisi')->nullable();
            $table->string('bpkb')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('deskripsi_brg')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('opd')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('jenis_transaksi_id')->nullable();
            $table->unsignedBigInteger('klasifikasi_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->softDeletes();
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

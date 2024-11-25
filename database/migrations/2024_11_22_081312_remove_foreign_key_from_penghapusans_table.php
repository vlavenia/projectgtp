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
        Schema::table('penghapusans', function (Blueprint $table) {
            $table->dropForeign(['asset_id']); // Hapus foreign key yang mengarah ke aset_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menambahkan foreign key kembali jika perlu rollback
        Schema::table('penghapusans', function (Blueprint $table) {
            $table->foreign('asset_id')->references('id')->on('aset')->onDelete('cascade');
        });
    }
};

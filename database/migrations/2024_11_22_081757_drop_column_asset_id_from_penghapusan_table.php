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
            $table->dropColumn('asset_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penghapusans', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_id')->nullable();

            // Jika kolom sebelumnya memiliki foreign key
            $table->foreign('asset_id')->references('id')->on('aset')->onDelete('cascade');
        });
    }
};

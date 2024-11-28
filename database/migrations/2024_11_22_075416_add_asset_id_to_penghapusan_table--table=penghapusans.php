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
            $table->unsignedBigInteger('asset_id')->after('id')->required();
            $table->foreign('asset_id')->references('id')->on('assets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penghapusans', function (Blueprint $table) {
            $table->dropColumn('asset_id');
        });
    }
};

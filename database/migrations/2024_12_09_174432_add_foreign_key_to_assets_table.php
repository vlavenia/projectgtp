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
        Schema::table('assets', function (Blueprint $table) {

            // $table->foreign('jenis_id')
            //     ->references('id')
            //     ->on('jenis')
            //     ->onDelete('restrict');
            $table->foreign('objek_id')
                ->references('id')
                ->on('objeks')
                ->onDelete('restrict');

            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->onDelete('restrict');

            $table->foreign('asal_id')
                ->references('id')
                ->on('asals')
                ->onDelete('restrict');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('restrict');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('restrict');

            $table->foreign('jenis_transaksi_id')
                ->references('id')
                ->on('jenis_transaksis')
                ->onDelete('restrict');

            $table->foreign('klasifikasi_id')
                ->references('id')
                ->on('klasifikasis')
                ->onDelete('restrict');
        });

        Schema::table(
            'objeks',
            function (Blueprint $table) {
                $table->foreign('jenis_id')
                    ->references('id')
                    ->on('jenis')
                    ->onDelete('restrict');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['jenis_id']);
            $table->dropForeign(['objek_id']);
            $table->dropForeign(['kategori_id']);
            $table->dropForeign(['asal_id']);
            $table->dropForeign(['status_id']);
        });
    }
};

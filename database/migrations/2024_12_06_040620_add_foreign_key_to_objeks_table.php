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
        Schema::table('objeks', function (Blueprint $table) {
            $table->foreign('jenis_id')
                ->references('id')
                ->on('jenis')
                ->onDelete('cascade'); // Opsional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('objeks', function (Blueprint $table) {
            $table->dropForeign(['jenis_id']); // Hapus foreign key saat rollback
        });
    }
};

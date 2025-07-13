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
        Schema::create('detail_angkutan', function (Blueprint $table) {
            $table->bigIncrements('id_angkutan'); // primary key manual
            $table->integer('aset_id')->nullable();
            $table->string('rangka')->nullable();
            $table->string('mesin')->nullable();
            $table->string('polisi')->nullable();
            $table->string('bpkb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_angkutan');
    }
};

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
        Schema::create('sarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('kategori', ['saran', 'masukan', 'pertanyaan']);
            $table->text('pesan');
            $table->enum('status_baca', ['belum_dibaca', 'sudah_dibaca'])->default('belum_dibaca');
            $table->enum('status_persetujuan', ['menunggu', 'disetujui', 'tidak_disetujui'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarans');
    }
};

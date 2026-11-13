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
        Schema::create('log_kuncis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjamans')->onDelete('cascade');
            $table->foreignId('aslab_id')->nullable()->constrained('users');
            $table->string('nomor_identitas_ktm');
            $table->string('nama_penitip');
            $table->enum('status_kunci', ['belum_diambil', 'sedang_dipinjam', 'sudah_dikembalikan'])->default('belum_diambil');
            $table->timestamp('waktu_diambil')->nullable();
            $table->timestamp('waktu_dikembalikan')->nullable();
            $table->text('catatan_kondisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_kuncis');
    }
};

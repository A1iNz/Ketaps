<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            // Relasi: Siapa perusahaan yang memposting loker ini?
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Informasi Utama Lowongan
            $table->string('title');            // Contoh: Backend Developer
            $table->string('company_name');     // Nama PT/CV (diambil otomatis dari user)
            $table->text('description');        // Job Desk & Kualifikasi
            $table->string('location');         // Contoh: Ketapang, Kalimantan Barat

            // Informasi Tambahan
            $table->string('salary')->nullable(); // Contoh: Rp 3.000.000 - 5.000.000
            $table->enum('type', ['Full-time', 'Part-time', 'Internship', 'Contract']); // Jenis Kontrak

            // Sistem Kontrol Admin
            // PENDING: Menunggu persetujuan, APPROVED: Tampil di publik, REJECTED: Ditolak admin
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // Relasi utama
            $table->foreignId('applicant_id')
                  ->constrained('applicants')
                  ->cascadeOnDelete();

            // Tahun ajaran
            $table->string('academic_year');

            // Jalur pendaftaran
            $table->enum('registration_path', [
                'regular',
                'prestasi',
                'afirmasi'
            ])->default('regular');

            // Status akhir pendaftaran
            $table->enum('registration_status', [
                'menunggu_verifikasi',
                'diterima',
                'ditolak',
                'daftar_ulang'
            ])->default('menunggu_verifikasi');

            // Catatan panitia
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

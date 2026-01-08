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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            // Relasi ke sekolah
            $table->foreignId('school_id')
                  ->constrained('schools')
                  ->cascadeOnDelete();

            // Rekap data PPDB
            $table->integer('total_applicant');     // Total pendaftar
            $table->integer('total_verified');      // Total berkas terverifikasi
            $table->integer('total_paid');          // Total yang sudah membayar

            // Validasi oleh yayasan
            $table->foreignId('validated_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->text('note')->nullable();       // Catatan yayasan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            // Identitas Pendaftaran
            $table->string('registration_number')->unique();

            // Data Pribadi Calon Siswa
            $table->string('full_name');
            $table->string('nik', 20)->unique();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['L', 'P']);
            $table->text('address');

            // Data Orang Tua
            $table->string('parent_name');
            $table->string('parent_phone', 15);

            // Data Pendidikan
            $table->string('previous_school');
            $table->foreignId('school_id')
                  ->constrained('schools')
                  ->cascadeOnDelete();

            // Status Pendaftaran
            $table->enum('status', [
                'pending',
                'verified',
                'rejected',
                'accepted'
            ])->default('pending');

            // Catatan verifikasi (oleh admin sekolah)
            $table->text('verification_note')->nullable();

            // Akun siswa (dibuat setelah verifikasi)
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};

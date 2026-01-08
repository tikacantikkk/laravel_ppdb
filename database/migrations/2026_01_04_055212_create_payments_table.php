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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel registrations
            $table->foreignId('registration_id')
                  ->constrained('registrations')
                  ->cascadeOnDelete();

            // Data transaksi dari Midtrans
            $table->string('order_id')->unique();      // ID transaksi Midtrans
            $table->string('bank');                    // Bank Virtual Account
            $table->string('va_number');               // Nomor VA
            $table->decimal('amount', 12, 2);          // Nominal pembayaran

            // Status transaksi pembayaran
            $table->enum('transaction_status', [
                'pending',
                'success',
                'failed',
                'expired'
            ])->default('pending');

            // Waktu transaksi dari Midtrans
            $table->dateTime('transaction_time')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

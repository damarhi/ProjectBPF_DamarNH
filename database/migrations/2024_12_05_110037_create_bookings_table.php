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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id');
            $table->foreignId('pengguna_id');
            $table->date('tanggal_booking');
            $table->enum('status',['Tunggu','Disetujui','Ditolak','Selesai']);
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah_produk');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

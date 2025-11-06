<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Pastikan kolom sudah sesuai tipe
            $table->unsignedBigInteger('pelanggan_id')->nullable()->change();

            // Tambahkan foreign key-nya
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans')
                ->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Hapus foreign key lama (jika ada)
            if (Schema::hasColumn('pesanan', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            // Tambahkan kolom pelanggan_id
            $table->unsignedBigInteger('pelanggan_id')->nullable()->after('id');
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans')  // ✅ pakai huruf S
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
        });
    }
};

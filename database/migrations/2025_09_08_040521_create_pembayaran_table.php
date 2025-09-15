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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->string('metode')->default('transfer'); // transfer / qris / cod
            $table->string('bukti')->nullable(); // path upload bukti pembayaran
            $table->string('status')->default('pending'); // pending / dibayar / gagal
            $table->timestamps();

            $table->foreign('pesanan_id')
                ->references('id')->on('pesanan')
                ->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

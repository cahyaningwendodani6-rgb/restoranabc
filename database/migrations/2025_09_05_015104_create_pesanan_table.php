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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);                     
            $table->string('telp', 20)->nullable();          
            $table->string('email', 128)->nullable();        
            $table->text('alamat')->nullable();              
            $table->string('pesanan', 128);                  
            $table->enum('metode_pembayaran', [              
                'Cash', 'Transfer', 'QRIS'
            ]);
            $table->text('catatan')->nullable();             
            $table->decimal('total_harga', 10, 2)->default(0); 
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};

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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();   
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('kode_booking')->unique();
            $table->date('tanggal_rental');
            $table->date('tanggal_selesai');
            $table->enum('status_sewa', [
                'pending',  
                'ongoing',   
                'selesai',   
                'batal'
            ])->default('pending');
            $table->integer('total_harga')->default(0);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};

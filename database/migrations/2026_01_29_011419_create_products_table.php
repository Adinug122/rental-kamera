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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->integer('harga');
            $table->text('deskripsi')->nullable();
            $table->string('brands')->nullable();
            $table->string('image')->nullable();
            $table->integer('jumlah_unit')->default('1');
            $table->boolean('is_new')->default(false);
            $table->boolean('is_sale')->default(false);
            $table->integer('discount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

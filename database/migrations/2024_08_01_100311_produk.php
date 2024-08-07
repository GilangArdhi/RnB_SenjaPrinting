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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('namaPemesan');
            $table->string('asalPemesan');
            $table->string('namaProduk');
            $table->int('jmlPesanan');
            $table->string('bahan');
            $table->string('ukuran');
            $table->string('warna');
            $table->string('desain');
            $table->string('jeniSablon');
            $table->string('status')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

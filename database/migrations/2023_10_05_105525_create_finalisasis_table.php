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
        Schema::create('finalisasis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_instansi_provinsi')->nullable()->constraint('instansis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('finalisasi_penentuan_lokasi_admin')->nullable();
            $table->string('finalisasi_banding_lokasi_admin')->nullable();
            $table->string('finalisasi_penentuan_lokasi_bpsprov')->nullable();
            $table->string('finalisasi_banding_lokasi_bpsprov')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finalisasis');
    }
};

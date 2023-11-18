<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_laporan');
            $table->foreign('id_laporan')->references('id')->on('laporan_akhirs')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('penilai', ['dospem', 'pemlap']);
            $table->double('nilai_k1', 5, 2)->nullable();
            $table->double('nilai_k2', 5, 2)->nullable();
            $table->double('nilai_k3', 5, 2)->nullable();
            $table->double('nilai_k4', 5, 2)->nullable();
            $table->double('nilai_k5', 5, 2)->nullable();
            $table->double('nilai_k6', 5, 2)->nullable();
            $table->double('nilai_k7', 5, 2)->nullable();
            $table->double('nilai_k8', 5, 2)->nullable();
            $table->double('nilai_k9', 5, 2)->nullable();
            $table->double('nilai_k10', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_laporans');
    }
};
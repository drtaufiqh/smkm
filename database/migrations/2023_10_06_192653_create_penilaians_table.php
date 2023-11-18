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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs');
            $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->double('nilai_laporan_dospem', 5, 2)->nullable();
            $table->double('nilai_laporan_pemlap', 5, 2)->nullable();
            $table->double('nilai_kinerja', 5, 2)->nullable();
            $table->double('nilai_bimbingan', 5, 2)->nullable();
            $table->double('nilai_akhir', 5, 2)->nullable();
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
        Schema::dropIfExists('penilaians');
    }
};
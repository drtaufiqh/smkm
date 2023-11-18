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
        Schema::create('laporan_akhirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs');
            $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->string('laporan_awal');
            $table->text('komentar_pemlap');
            $table->boolean('approval_awal_pemlap');
            $table->boolean('approval_awal_dospem');
            $table->string('laporan_final');
            $table->boolean('approval_akhir_pemlap');
            $table->boolean('approval_akhir_dospem');
            $table->boolean('approval_akhir_kampus');
            $table->double('nilai_akhir_pemlap', 5, 2);
            $table->double('nilai_akhir_dospem', 5, 2);

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
        Schema::dropIfExists('laporan_akhirs');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilihan_lokasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs');
            $table->foreign('id_mhs')->references('id')->on('mahasiswas');
            $table->foreignId('id_pilihan_1');
            $table->foreign('id_pilihan_1')->references('id')->on('instansis');
            $table->foreignId('id_pilihan_2');
            $table->foreign('id_pilihan_2')->references('id')->on('instansis');
            $table->text('alasan_pilihan_1');
            $table->text('alasan_pilihan_2');
            $table->foreignId('id_instansi_ajuan');
            $table->foreign('id_instansi_ajuan')->references('id')->on('instansis');
            $table->foreignId('id_instansi_banding');
            $table->foreign('id_instansi_banding')->references('id')->on('instansis');
            $table->text('alasan_banding');
            $table->foreignId('id_instansi');
            $table->foreign('id_instansi')->references('id')->on('instansis');
            
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
        Schema::dropIfExists('pemilihan_lokasis');
    }
};

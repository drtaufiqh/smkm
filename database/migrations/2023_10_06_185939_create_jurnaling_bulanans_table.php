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
        Schema::create('jurnaling_bulanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs')->constraint('mahasiswas')->onDelete('cascade');
            // $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreignId('id_penilai')->nullable()->constraint('pembimbing_lapangans')->onDelete('set null');
            // $table->foreign('id_penilai')->references('id')->on('pembimbing_lapangans')->onDelete('set null');
            $table->integer('periode')->nullable();
            $table->text('uraian_kegiatan');
            $table->string('satuan',50);
            $table->integer('kuantitas_target');
            $table->integer('kuantitas_realisasi');
            $table->double('tingkat_kuantitas', 5, 2)->nullable();
            $table->double('tingkat_kualitas', 5, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('status_final_mhs')->nullable();
            $table->boolean('status_final_penilai')->nullable();
            
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
        Schema::dropIfExists('jurnaling_bulanans');
    }
};

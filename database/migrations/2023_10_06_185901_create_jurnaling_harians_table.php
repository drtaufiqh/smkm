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
        Schema::create('jurnaling_harians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs')->constraint('mahasiswas')->onDelete('cascade');
            // $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreignId('id_penilai')->nullable()->constraint('pembimbing_lapangans')->onDelete('set null');
            // $table->foreign('id_penilai')->references('id')->on('pembimbing_lapangans')->onDelete('set null');
            $table->date('tanggal');
            $table->text('deskripsi_pekerjaan');
            $table->integer('kuantitas_volume');
            $table->string('kuantitas_satuan');
            $table->string('durasi_waktu',50);
            $table->string('pemberi_tugas',50);
            $table->double('status_penyelesaian', 5, 2);
            $table->boolean('status_final_mhs');
            $table->boolean('status_final_penilai');
            
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
        Schema::dropIfExists('jurnaling_harians');
    }
};

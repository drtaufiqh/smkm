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
        Schema::create('kartu_kendalis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bimbingan');
            $table->foreign('id_bimbingan')->references('id')->on('jadwal_bimbingans');
            $table->foreignId('id_mhs');
            $table->foreign('id_mhs')->references('id')->on('mahasiswas');
            $table->text('pokok_bahasan');
            $table->boolean('diketahui');
            
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
        Schema::dropIfExists('kartu_kendalis');
    }
};

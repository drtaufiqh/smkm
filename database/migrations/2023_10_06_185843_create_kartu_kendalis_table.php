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
            $table->foreignId('id_bimbingan')->constraint('jadwal_bimbingans')->onDelete('cascade');
            // $table->foreign('id_bimbingan')->references('id')->on('jadwal_bimbingans')->onDelete('cascade');
            $table->foreignId('id_mhs')->constaint('mahasiswas')->onDelete('cascade');
            // $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->text('pokok_bahasan')->nullable();
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

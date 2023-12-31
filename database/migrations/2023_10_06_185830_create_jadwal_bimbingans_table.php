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
        Schema::create('jadwal_bimbingans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('lokasi',['offline','online']);
            $table->text('link')->nullable();
            $table->foreignId('id_dosen_pembimbing')->constraint('dosen_pembimbings')->onDelete('cascade');
            // $table->foreign('id_dosen_pembimbing')->references('id')->on('dosen_pembimbings')->onDelete('cascade');
            
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
        Schema::dropIfExists('jadwal_bimbingans');
    }
};

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
        Schema::create('penilaian_bimbingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs')->constraint('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->double('nilai_k1', 5, 2)->nullable();
            $table->double('nilai_k2', 5, 2)->nullable();
            $table->double('nilai_k3', 5, 2)->nullable();
            $table->double('nilai_k4', 5, 2)->nullable();
            $table->double('nilai_k5', 5, 2)->nullable();

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
        Schema::dropIfExists('penilaian_bimbingans');
    }
};
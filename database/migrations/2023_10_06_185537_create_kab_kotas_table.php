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
        Schema::create('kab_kotas', function (Blueprint $table) {
            $table->id();
            $table->string('kode',4);
            $table->string('nama',60);
            $table->string('akronim',60);
            $table->foreignId('id_prov');
            $table->foreign('id_prov')->references('id')->on('Provinsis');
            // $table->foreignId('kode_prov');
            // $table->foreign('kode_prov')->references('kode')->on('Provinsis');
            
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
        Schema::dropIfExists('kab_kotas');
    }
};

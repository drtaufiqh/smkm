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
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constraint('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama',50);
            $table->foreignId('id_kecamatan')->nullable()->constraint('kecamatans')->onDelete('set null')->onUpdate('cascade');
            // $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('id_kab_kota')->nullable()->constraint('kab_kotas')->onDelete('set null')->onUpdate('cascade');
            $table->string('kode_kabkota',4);
            // $table->foreignId('kode_kabkota')->nullable();
            // $table->foreign('kode_kabkota')->references('id')->on('kab_kotas')->onDelete('set null')->onUpdate('cascade');
            $table->text('alamat_lengkap');
            $table->boolean('is_prov');
            
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
        Schema::dropIfExists('instansis');
    }
};

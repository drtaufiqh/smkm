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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users');            
            $table->string('nama',50);
            $table->string('nim',9);
            $table->string('email',100);
            $table->string('no_hp',20);
            $table->string('foto',255);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->text('alamat_1');
            $table->foreignId('id_kecamatan_alamat_1');
            $table->foreign('id_kecamatan_alamat_1')->references('id')->on('kecamatans');
            $table->text('alamat_2');
            $table->foreignId('id_kecamatan_alamat_2');
            $table->foreign('id_kecamatan_alamat_2')->references('id')->on('kecamatans');
            $table->string('bank',20);
            $table->string('an_bank',50);
            $table->string('no_rek',50);
            $table->foreignId('id_dosen_pembimbing');
            $table->foreign('id_dosen_pembimbing')->references('id')->on('dosen_pembimbings');
            $table->foreignId('id_pembimbing_lapangan');
            $table->foreign('id_pembimbing_lapangan')->references('id')->on('pembimbing_lapangans');
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
        Schema::dropIfExists('mahasiswas');
    }
};

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
        Schema::create('pembimbing_lapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama',50);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('nip_lama',50);
            $table->string('nip_baru',50);
            $table->enum('golongan', ['Ia', 'Ib', 'Ic', 'Id', 'IIa', 'IIb', 'IIc', 'IId', 'IIIa', 'IIIb', 'IIIc', 'IIId', 'IVa', 'IVb', 'IVc', 'IVd', 'IVe']);
            $table->string('jabatan',10);
            $table->string('email',100);
            $table->string('no_hp',20);
            $table->foreignId('id_instansi');
            $table->foreign('id_instansi')->references('id')->on('Instansis');
            $table->string('foto',255);
            
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
        Schema::dropIfExists('pembimbing_lapangans');
    }
};

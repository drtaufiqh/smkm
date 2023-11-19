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
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama',50);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('nip_lama',50)->nullable();
            $table->string('nip_baru',50)->nullable();
            $table->enum('golongan', ['Ia', 'Ib', 'Ic', 'Id', 'IIa', 'IIb', 'IIc', 'IId', 'IIIa', 'IIIb', 'IIIc', 'IIId', 'IVa', 'IVb', 'IVc', 'IVd', 'IVe'])->nullable();
            $table->string('jabatan',10)->nullable();
            $table->string('email',100);
            $table->string('no_hp',20)->nullable();
            $table->foreignId('id_instansi')->nullable();
            $table->foreign('id_instansi')->references('id')->on('Instansis')->onDelete('set null')->onUpdate('cascade');
            $table->string('foto',255)->nullable();
            
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

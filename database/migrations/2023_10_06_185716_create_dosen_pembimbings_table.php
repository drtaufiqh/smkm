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
        Schema::create('dosen_pembimbings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constraint('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama',50);
            $table->string('nip_lama',50)->nullable();
            $table->string('nip_baru',50)->nullable();
            $table->string('email',100);
            $table->string('no_hp',20);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
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
        Schema::dropIfExists('dosen_pembimbings');
    }
};

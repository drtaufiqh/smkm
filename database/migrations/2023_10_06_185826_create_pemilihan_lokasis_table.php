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
        Schema::create('pemilihan_lokasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs')->constraint('mahasiswas')->onDelete('cascade');
            // $table->foreign('id_mhs')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreignId('id_pilihan_1')->nullable()->constraint('instansis')->onDelete('set null');
            // $table->foreign('id_pilihan_1')->references('id')->on('instansis')->onDelete('set null');
            $table->foreignId('id_pilihan_2')->nullable()->constraint('instansis')->onDelete('set null');
            // $table->foreign('id_pilihan_2')->references('id')->on('instansis')->onDelete('set null');
            $table->text('alasan_pilihan_1')->nullable();
            $table->text('alasan_pilihan_2')->nullable();
            $table->foreignId('id_instansi_ajuan')->nullable()->constraint('instansis')->onDelete('set null');
            // $table->foreign('id_instansi_ajuan')->references('id')->on('instansis')->onDelete('set null');
            $table->foreignId('id_instansi_banding')->nullable()->constraint('instansis')->onDelete('set null');
            // $table->foreign('id_instansi_banding')->references('id')->on('instansis')->onDelete('set null');
            $table->text('alasan_banding')->nullable();
            $table->boolean('admin_setuju_banding')->nullable();
            $table->foreignId('id_instansi')->nullable()->constraint('instansis')->onDelete('set null');
            // $table->foreign('id_instansi')->references('id')->on('instansis')->onDelete('set null');
            $table->text('keterangan')->nullable();
            $table->foreignId('id_pengalihan')->nullable()->constraint('instansis')->onDelete('set null');
            // $table->foreign('id_pengalihan')->references('id')->on('instansis')->onDelete('set null');
            
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
        Schema::dropIfExists('pemilihan_lokasis');
    }
};

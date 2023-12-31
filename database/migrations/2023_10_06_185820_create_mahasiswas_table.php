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
            $table->foreignId('id_user')->constraint('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');            
            $table->string('nama',50);
            $table->string('nim',9);
            $table->string('email',100)->unique();
            $table->string('kelas',4)->nullable();
            $table->string('no_hp',20)->nullable();
            $table->string('foto',255)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat_1')->nullable();
            $table->foreignId('id_kecamatan_alamat_1')->nullable()->constraint('kecamatans')->onDelete('set null')->onUpdate('cascade');
            // $table->foreign('id_kecamatan_alamat_1')->references('id')->on('kecamatans')->onDelete('set null');
            $table->foreignId('id_kab_kota_alamat_1')->nullable()->constraint('kab_kotas')->onDelete('set null')->onUpdate('cascade');
            // $table->foreignId('kode_kabkota_1')->nullable();
            // $table->foreign('kode_kabkota_1')->references('id')->on('kab_kotas')->onDelete('set null')->onUpdate('cascade');
            $table->string('kecamatan_1')->nullable();
            $table->text('alamat_2')->nullable();
            $table->foreignId('id_kecamatan_alamat_2')->nullable()->constraint('kecamatans')->onDelete('set null')->onUpdate('cascade');
            // $table->foreign('id_kecamatan_alamat_2')->references('id')->on('kecamatans')->onDelete('set null');
            $table->foreignId('id_kab_kota_alamat_2')->nullable()->constraint('kab_kotas')->onDelete('set null')->onUpdate('cascade');
            // $table->foreignId('kode_kabkota_2')->nullable();
            // $table->foreign('kode_kabkota_2')->references('id')->on('kab_kotas')->onDelete('set null')->onUpdate('cascade');
            $table->string('kecamatan_2')->nullable();
            $table->string('bank',20)->nullable();
            $table->string('an_bank',50)->nullable();
            $table->string('no_rek',50)->nullable();
            $table->foreignId('id_dosen_pembimbing')->nullable();
            $table->foreign('id_dosen_pembimbing')->references('id')->on('dosen_pembimbings')->onDelete('set null');
            $table->foreignId('id_pembimbing_lapangan')->nullable();
            $table->foreign('id_pembimbing_lapangan')->references('id')->on('pembimbing_lapangans')->onDelete('set null');
            $table->foreignId('id_instansi')->nullable();
            $table->foreign('id_instansi')->references('id')->on('instansis')->onDelete('set null');
            $table->boolean('is_final')->nullable()->default(false);
            
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

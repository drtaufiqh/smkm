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
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode',7);
            $table->string('nama',60);
            $table->string('akronim',60)->nullable();
            $table->foreignId('id_kabkota')->constraint('kab_kotas')->nullable()->onDelete('set null')->onUpdate('set null');
            // $table->foreign('id_kabkota')->references('id')->on('kab_kotas')->onDelete('set null')->onUpdate('set null');
            
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
        Schema::dropIfExists('kecamatans');
    }
};

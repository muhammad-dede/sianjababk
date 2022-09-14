<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaLingkunganKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_lingkungan_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->string('aspek')->nullable();
            $table->string('faktor')->nullable();

            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisa_lingkungan_kerja');
    }
}

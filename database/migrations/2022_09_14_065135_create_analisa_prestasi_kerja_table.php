<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaPrestasiKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_prestasi_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->string('hasil_prestasi_kerja')->nullable();
            $table->double('jumlah_hasil_prestasi_kerja')->nullable();
            $table->double('jam_prestasi_kerja')->nullable();

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
        Schema::dropIfExists('analisa_prestasi_kerja');
    }
}

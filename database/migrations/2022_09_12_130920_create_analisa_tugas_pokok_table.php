<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaTugasPokokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_tugas_pokok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->string('uraian_tugas_pokok')->nullable();
            $table->string('hasil_kerja_tugas_pokok')->nullable();
            $table->double('jumlah_hasil')->nullable();
            $table->double('waktu_penyelesaian')->nullable()->comment('JAM');
            $table->double('waktu_efektif')->nullable();
            $table->double('kebutuhan_pegawai')->nullable();

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
        Schema::dropIfExists('analisa_tugas_pokok');
    }
}

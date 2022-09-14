<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->string('jpt_utama')->nullable()->comment('Unit Kerja');
            $table->string('jpt_madya')->nullable()->comment('Unit Kerja');
            $table->string('jpt_pratama')->nullable()->comment('Unit Kerja');
            $table->string('administrator')->nullable()->comment('Unit Kerja');
            $table->string('pengawas')->nullable()->comment('Unit Kerja');
            $table->string('pelaksana')->nullable()->comment('Unit Kerja');
            $table->string('jabatan_fungsional')->nullable()->comment('Unit Kerja');
            $table->text('ikhtisar')->nullable();
            $table->string('pendidikan_formal')->nullable()->comment('Kualifikasi Jabatan');
            $table->string('pendidikan_pelatihan_penjenjangan')->nullable()->comment('Kualifikasi Jabatan');
            $table->string('pendidikan_pelatihan_teknis')->nullable()->comment('Kualifikasi Jabatan');
            $table->string('pengalaman_kerja_struktural')->nullable()->comment('Kualifikasi Jabatan');
            $table->string('pengalaman_kerja_fungsional')->nullable()->comment('Kualifikasi Jabatan');
            $table->string('pengalaman_kerja_bidang_jabatan')->nullable()->comment('Kualifikasi Jabatan');
            $table->string('hasil_kerja')->nullable();
            $table->string('keterampilan_kerja')->nullable()->comment('Syarat Kerja');
            $table->string('bakat_kerja')->nullable()->comment('Syarat Kerja');
            $table->string('temperamen_kerja')->nullable()->comment('Syarat Kerja');
            $table->string('minat_kerja')->nullable()->comment('Syarat Kerja');
            $table->string('upaya_fisik')->nullable()->comment('Syarat Kerja');
            $table->string('jk')->nullable()->comment('Kondisi Fisik');
            $table->string('umur')->nullable()->comment('Kondisi Fisik');
            $table->string('tinggi_badan')->nullable()->comment('Kondisi Fisik');
            $table->string('berat_badan')->nullable()->comment('Kondisi Fisik');
            $table->string('postur_badan')->nullable()->comment('Kondisi Fisik');
            $table->string('penampilan')->nullable()->comment('Kondisi Fisik');
            $table->string('fungsi_pekerjaan')->nullable()->comment('Syarat Kerja');
            $table->string('kelas_jabatan')->nullable();

            $table->timestamps();

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
        Schema::dropIfExists('analisa');
    }
}

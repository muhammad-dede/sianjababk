<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaBahanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_bahan_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->string('bahan_kerja')->nullable();
            $table->string('penggunaan_bahan_kerja')->nullable();

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
        Schema::dropIfExists('analisa_bahan_kerja');
    }
}

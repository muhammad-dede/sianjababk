<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->char('kode', 36)->nullable()->unique();
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('id_skpd')->nullable();
            $table->unsignedBigInteger('induk')->nullable();

            $table->foreign('id_skpd')->references('id')->on('skpd')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('induk')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan');
    }
}

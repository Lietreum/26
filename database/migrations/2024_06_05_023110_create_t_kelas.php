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
        Schema::create('t_kelas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kelas', 10);
            $table->string('Jurusan', 50);
            $table->string('lokasi_ruangan', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_kelas');
    }
};

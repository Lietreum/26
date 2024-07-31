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
        Schema::create('t_siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nis', 10);
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('alamat', 100);
            $table->string('no_hp', 15);
            $table->string('email', 50);
            $table->string('foto', 100);
            $table->string('id_kelas', 10);
            $table->string('id_jurusan', 10);
            $table->string('id_spp', 10);
            $table->string('password', 100);
            $table->enum('level', ['admin', 'petugas', 'siswa']);
            $table->enum('status', ['aktif', 'tidak aktif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_siswa');
    }
};

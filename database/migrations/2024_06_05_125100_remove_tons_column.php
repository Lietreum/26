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
        Schema::table('t_siswa', function (Blueprint $table) {
            $table->dropColumn('tanggal_lahir');
   

            // nama	tempat_lahir	tanggal_lahir	alamat	no_hp	email	foto	id_kelas	id_jurusan	id_spp	password	level	status	

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_kelas', function (Blueprint $table) {
            //
        });
    }
};

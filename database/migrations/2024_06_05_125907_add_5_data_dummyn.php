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
            // $table->string('nis', 50);
            $table->string('nama lengkap', 50);
            $table->string('jk', 50);
            $table->string('golongan_darah', 50);

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

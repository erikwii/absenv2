<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->string('id_temu',10)->primary();
			$table->dateTime('tanggal');
			$table->string('Noreg');
			$table->foreign('Noreg')->references('Noreg')->on('students');
			$table->string('Kode_Dosen');
			$table->foreign('Kode_Dosen')->references('Kode_Dosen')->on('lecturers');
			$table->string('Kode_Matkul',10);
			$table->foreign('Kode_Matkul')->references('Kode_Matkul')->on('courses');
			$table->string('id_ruang',10);
			$table->foreign('id_ruang')->references('id_ruang')->on('rooms');
			$table->string('Kehadiran',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presences');
    }
}

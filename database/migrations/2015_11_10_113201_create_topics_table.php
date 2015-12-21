<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id_topik',10);
			$table->string('nama_topik',30);
			$table->string('pertemuan_ke',5);
			$table->dateTime('tanggal');
			$table->string('jumlah_mhs',5);
			$table->string('keterangan',100);
			$table->string('Kode_Matkul',10);
			$table->foreign('Kode_Matkul')->references('Kode_Matkul')->on('courses');
			$table->string('id_temu',10);
			$table->foreign('id_temu')->references('id_temu')->on('presences');
			$table->string('Kode_Dosen',10);
			$table->foreign('Kode_Dosen')->references('Kode_Dosen')->on('lecturers'); 
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
        Schema::drop('topics');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('Noreg',10)->primary();
			$table->string('Nama_Mhs',30);
			$table->integer('Prodi_Id',True,True);
			$table->string('Alamat',50);
			$table->string('Telepon',15);
			$table->string('Semester',10);
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::drop('students');
    }
}

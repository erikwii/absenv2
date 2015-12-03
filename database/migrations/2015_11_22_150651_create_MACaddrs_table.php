<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMACaddrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MACaddrs', function (Blueprint $table) {
            $table->bigInteger('MAC_Addr')->primary();
			$table->string('Noreg');
			$table->foreign('Noreg')->references('Noreg')->on('students');
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
        Schema::drop('MACaddrs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblInscripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inscripcion', function (Blueprint $table) {
            $table->biginteger('id',true)->index();
            $table->string('NoPrescripcion');
            $table->string('TipoTec');
            $table->string('ConTec');
            $table->string('NoEntrega');
            $table->string('FecDireccionamiento');
            $table->string('EstDireccionamiento');

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
        Schema::dropIfExists('tbl_inscripcion');
    }
}

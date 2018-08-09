<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data')->nullable();
            $table->time('horaEntrada')->nullable();
            $table->time('horaSaiAlmoco')->nullable();
            $table->time('horaVoltaAlmoco')->nullable();
            $table->time('horaSaida')->nullable();
            $table->char('SaidaRapida', 1)->nullable();
            $table->time('horaSaidaRapida')->nullable();
            $table->time('horaChegadaRapida')->nullable();

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
        Schema::table('dias', function (Blueprint $table) {
            $table->dropForeign('dias_dias_id_foreign');

         });     

        Schema::dropIfExists('dias');
    }
}

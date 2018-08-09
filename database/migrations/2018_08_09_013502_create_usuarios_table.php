<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsuariosTable.
 */
class CreateUsuariosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50); 
            $table->char('cpf', 11)->unique();     
     
            $table->char('password', 4)->unique();

            $table->date('dia_id')->unsigned()->nullable();
            $table->foreign('dia_id')->references('id')->on('dias');

            //Permission
            $table->string('status')->default('active');
            $table->string('permission')->default('app.usuario');

            $table->timestamps();
            $table->softDeletes();

		});
	}	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuarios', function(Blueprint $table) {

		});
		Schema::drop('usuarios');
	}
}

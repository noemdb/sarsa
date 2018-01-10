<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('rol', ['CONTRA', 'DIRCP', 'CORCP','COMCP', 'ADMIN', 'USUARIO'])->default('USUARIO');
            $table->enum('rango', ['ADMIN','MASTER', 'USER'])->default('USER');
            $table->string('descripcion');
            $table->date('finicial');
            $table->date('ffinal');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }
}

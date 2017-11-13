<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            // $table->string('email')->unique();
            $table->string('password');
            $table->enum('is_active', ['Activo', 'Desactivo'])->default('Activo');
            // $table->enum('rango', ['root', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_loginout_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}

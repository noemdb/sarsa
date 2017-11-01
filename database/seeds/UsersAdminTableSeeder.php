<?php

use Illuminate\Database\Seeder;

class UsersAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;
        $id = DB::table('users')->insertGetId([
            'username' => "admin",
            'password' => $password ?: $password = bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);

        DB::table('profiles')->insert([
            'firstname' => "Administrador",
            'lastname' => "del Sistema",
            'url_img' => "img/admin.png",
            'email' => "admin@admin.com",
            'user_id' => $id,
        ]);

        DB::table('rols')->insert([
            'rol' => "admin",
            'rango' => "root",
            'descripcion' => "webmaster del sistema",
            'finicial' => "20000101",
            'ffinal' => "20200101",
            'user_id' => $id,
        ]);
    }
}
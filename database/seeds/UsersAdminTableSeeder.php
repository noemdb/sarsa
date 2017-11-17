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
            'is_active' => 'Activo',
            'remember_token' => str_random(10),
        ]);

        DB::table('profiles')->insert([
            'firstname' => "Administrador",
            'lastname' => "del Sistema",
            'url_img' => "images/avatar/default_user_admin.png",
            'email' => "admin@admin.com",
            'user_id' => $id,
        ]);

        DB::table('rols')->insert([
            'rol' => "ADMIN",
            'rango' => "admin",
            'descripcion' => "webmaster del sistema",
            'finicial' => "20000101",
            'ffinal' => "20200101",
            'user_id' => $id,
        ]);
    }
}

<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $is_active = ['Activo'=>'Activo','Desactivo'=>'Desactivo'];

    return [
        'username' => $faker->unique()->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'is_active' => array_rand($is_active,1),
        'last_login_at' => $faker->dateTimeBetween('2017-01-01',Carbon::now()),
        'last_loginout_at' => $faker->dateTimeBetween('2017-01-01',Carbon::now()),
        'created_at' => $faker->dateTimeBetween('2017-01-01',Carbon::now()),
        'remember_token' => str_random(10),
    ];
});

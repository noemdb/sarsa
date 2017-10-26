<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Rol::class, function (Faker $faker) {
    
	$arr_rol = ['CONTRA'=>'CONTRA','DIRCP'=>'DIRCP','CORCP'=>'CORCP','COMCP'=>'COMCP','admin'=>'admin','user'=>'user'];
	$arr_rango = ['root'=>'root','user'=>'user'];
	$ffinal = $faker->dateTimeBetween('-12 month','2017-01-01');
	$finicial = $faker->dateTimeBetween('2016-01-01',$ffinal);
    return [
        'rol' => array_rand($arr_rol,1),
        'rango' => array_rand($arr_rango,1),
        'descripcion' => $faker->sentence(10),
        'finicial' => $finicial,
        'ffinal' => $ffinal,
        'user_id' => function () { 
        	return 
        	DB::table('users')
				->select('users.*','rols.id as rols_id')
				->leftJoin('rols', 'users.id', '=', 'rols.user_id')
				->whereNull('rols.user_id')
                ->inRandomOrder()
				->first()->id;
        }
    ];
});

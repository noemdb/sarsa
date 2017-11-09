<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Alert::class, function (Faker $faker) {
	$arr_tipo = ['primary'=>'primary','success'=>'success','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
	$arr_estado = ['Visto'=>'Visto','No Visto'=>'No Visto'];
	$ffinal = $faker->dateTimeBetween('2017-01-01','2017-12-31');
	$finicial = $faker->dateTimeBetween('2017-01-01',$ffinal);
    $created_at = $faker->dateTimeBetween('2017-01-01','2017-12-31');

    return [
        'mensaje' => $faker->sentence(10),
        'tipo' => array_rand($arr_tipo,1),
        'estado' => array_rand($arr_estado,1),
        'finicial' => $finicial,
        'ffinal' => $ffinal,
        'created_at'=>$created_at,
        'updated_at'=>$created_at,
        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        },
        'destino_user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        }
    ];
});

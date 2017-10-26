<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Messege::class, function (Faker $faker) {
	$arr_tipo = ['primary'=>'primary','suscess'=>'suscess','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
	$arr_estado = ['Visto'=>'Visto','No Visto'=>'No Visto'];

    return [
        'mensaje' => $faker->sentence(10),
        'tipo' => array_rand($arr_tipo,1),
        'estado' => array_rand($arr_estado,1),
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

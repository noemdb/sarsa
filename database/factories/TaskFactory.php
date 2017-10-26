<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Task::class, function (Faker $faker) {
	
	$arr_tipo = ['primary'=>'primary','suscess'=>'suscess','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
	$arr_estado = ['iniciada'=>'iniciada','finalizada'=>'finalizada'];

    return [
        'codigo' => str_random(10),
        'descripcion' => $faker->sentence(10),
        'tipo' => array_rand($arr_tipo,1),
        'evento' => str_random(10),
        'estado' => array_rand($arr_estado,1),

        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        }
    ];
});

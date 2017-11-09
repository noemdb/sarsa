<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Task::class, function (Faker $faker) {
	
	$arr_tipo = ['primary'=>'primary','success'=>'success','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
	$arr_estado = ['iniciada'=>'iniciada','finalizada'=>'finalizada'];
    $created_at = $faker->dateTimeBetween('2017-01-01','2017-12-31');

    return [
        'codigo' => str_random(10),
        'descripcion' => $faker->sentence(10),
        'tipo' => array_rand($arr_tipo,1),
        'evento' => str_random(10),
        'estado' => array_rand($arr_estado,1),
        'created_at'=>$created_at,
        'updated_at'=>$created_at,

        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        }
    ];
});

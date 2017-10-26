<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Logdb::class, function (Faker $faker) {
	$arr_tipo = ['primary'=>'primary','suscess'=>'suscess','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
	$arr_estado = ['Visto'=>'Visto','No Visto'=>'No Visto'];
	$ffinal = $faker->dateTimeBetween('-12 month','2017-01-01');
	$finicial = $faker->dateTimeBetween('2016-01-01',$ffinal);

    return [
        'action' => $faker->word(),
        'model_class'=>$faker->word(),
        'data' => $faker->sentence(10),
        'ip' => $faker->ipv4(),
        'pathInfo' => $faker->url(),
        'url' => $faker->url(),

        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        },
    ];
});

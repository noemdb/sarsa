<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Logdb::class, function (Faker $faker) {
	$arr_tipo = ['primary'=>'primary','suscess'=>'suscess','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
    $created_at = $faker->dateTimeBetween('2017-01-01','2017-12-31');

    return [
        'action' => $faker->word(),
        'model_class'=>$faker->word(),
        'data' => $faker->sentence(10),
        'ip' => $faker->ipv4(),
        'pathInfo' => $faker->url(),
        'url' => $faker->url(),
        'created_at'=>$created_at,
        'updated_at'=>$created_at,

        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        },
    ];
});

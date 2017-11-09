<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Logdb::class, function (Faker $faker) {
	$arr_action = ['created'=>'created','deleted'=>'deleted','restored'=>'restored','updated'=>'updated'];
    $arr_tipo = ['primary'=>'primary','success'=>'success','info'=>'info','warning'=>'warning','danger'=>'danger','default'=>'default'];
    $created_at = $faker->dateTimeBetween('2017-01-01','2017-12-31');

    return [
        'action' => array_rand($arr_action,1),
        'model_class'=>$faker->word(),
        'tipo'=>array_rand($arr_tipo,1),
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

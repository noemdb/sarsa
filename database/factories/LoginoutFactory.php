<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Loginout::class, function (Faker $faker) {
	$arr_action = ['Registered'=>'Registered','Attempting'=>'Attempting','LogAuthenticated'=>'LogAuthenticated','LogSuccessfulLogin'=>'LogSuccessfulLogin','LogFailedLogin'=>'LogFailedLogin','LogSuccessfulLogout'=>'LogSuccessfulLogout','LogLockout'=>'LogLockout','LogPasswordReset'=>'LogPasswordReset'];
    $created_at = $faker->dateTimeBetween('2017-01-01','2017-12-31');

    return [
        'action' => array_rand($arr_action,1),
        'message' => $faker->sentence(10),
        'ip' => $faker->ipv4(),
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

<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Loginout::class, function (Faker $faker) {
	$arr_action = ['Registered'=>'Registered','Attempting'=>'Attempting','LogAuthenticated'=>'LogAuthenticated','LogSuccessfulLogin'=>'LogSuccessfulLogin','LogFailedLogin'=>'LogFailedLogin','LogSuccessfulLogout'=>'LogSuccessfulLogout','LogLockout'=>'LogLockout','LogPasswordReset'=>'LogPasswordReset'];

    return [
        'action' => array_rand($arr_action,1),
        'message' => $faker->sentence(10),
        'ip' => $faker->ipv4(),
        
        'user_id' => function () { 
        	return 
        	DB::table('users')
				->inRandomOrder()
				->first()->id;
        }
    ];
});

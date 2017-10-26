<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sys\Profile::class, function (Faker $faker) {

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'url_img' => 'img/profile_'.rand().'.png',
        'email' => $faker->unique()->safeEmail,
        'user_id' => function () { 
        	return 
        	DB::table('users')
				->select('users.*','profiles.id as profiles_id')
				->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
				->whereNull('profiles.user_id')
                ->inRandomOrder()
				->first()->id;
        }
        // 'user_id' => function () { return factory(App\User::class)->create()->id; }
    ];
});

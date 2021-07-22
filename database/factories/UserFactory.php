<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
// use Faker\Factory as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
// $faker = Faker::create('id_ID');


$factory->define(User::class, function (Faker $faker) {

	// $faker = Faker::create('id_ID');
	$gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->name($gender),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('rahasia'), // password
        'role' => $faker->randomElement(['user', 'eo']),
    	'gender' => $gender,
        'phone_number' => $faker->phoneNumber,
        'avatar' => 'user.png',
        'remember_token' => Str::random(60),
    ];
});

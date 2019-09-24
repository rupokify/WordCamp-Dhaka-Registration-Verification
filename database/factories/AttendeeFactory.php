<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Attendee;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Attendee::class, function (Faker $faker) {
    return [
    	'agent_id' => rand(1, 8),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => "01715" . $faker->numberBetween(100000,999999),
        'verified_at' => now()
    ];
});

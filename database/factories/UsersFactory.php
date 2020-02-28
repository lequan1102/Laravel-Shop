<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Backend\Entities\Users;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {
    return [
        'name'              =>  $faker->name,
        'email'             =>  $faker->unique()->safeEmail,
        'phone_number'      =>  $faker->phoneNumber,
        // 'address'           => $faker->address,
        'password'          =>  Hash::make(12345678),
    ];
});

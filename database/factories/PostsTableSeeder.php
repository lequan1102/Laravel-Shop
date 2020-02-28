<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Backend\Entities\Posts;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title'             =>  $faker->title,
        'slug'              =>  Str::slug($faker->title, "-"),
        'body'              =>  $faker->paragraph,
        'author_id'         =>  factory(Modules\Backend\Entities\Users::class),
        'category_id'       =>  factory(Modules\Backend\Entities\Users::class),
        'excerpt'           =>  $faker->paragraph,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Company;
use App\Job;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Job::class, function (Faker $faker) {
    $title = $faker->text();
    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(rand(2, 20)),
        'role' => $faker->name(),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'type' => 'fulltime',
        'status' => rand(0, 1),
        'last_date' => $faker->dateTime(),
    ];
});

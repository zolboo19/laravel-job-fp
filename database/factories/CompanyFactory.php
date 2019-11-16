<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    $cname = $faker->company;
    return [
        'user_id' => User::all()->random()->id,
        'cname' => $cname,
        'slug' => Str::slug($cname),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => 'avatar/man.jpg',
        'cover_photo' => 'cover/image.jpg',
        'slogan' => 'text-text and text',
        'description' => $faker->paragraph(rand(2, 20)),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Courier;
use Illuminate\Support\Str;

$factory->define(Courier::class, function (Faker $faker) {
    return [
        'name' => "Koombiyoo",
        'email' => "koombiyo@app.com",
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

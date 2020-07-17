<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Worker;
use Faker\Generator as Faker;

$factory->define(Worker::class, function (Faker $faker) {

    $randomNumber = rand(1,100);
    $cover = "https://picsum.photos/{$randomNumber}/300";

    return [
        'foto' => $cover,
        'posisi' => $faker->jobTitle ,
        'nama' => $faker->name,
        'keahlian' => $faker->title,
        'alamat' => $faker->address,
        'notelpon' => $faker->e164PhoneNumber ,
    ];
});

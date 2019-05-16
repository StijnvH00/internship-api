<?php


use App\Internship;
use Faker\Generator as Faker;


$factory->define(Internship::class, function (Faker $faker) {
    $dateFormat = 'Y-m-d';
    
    return [
        'intern' => $faker->firstName,
        'assignment' => $faker->text(255),
        'start' => $faker->dateTimeBetween('-50 days', '50 days')->format($dateFormat),
        'end' => $faker->dateTimeBetween('51 days', '100 days')->format($dateFormat)
    ];
});

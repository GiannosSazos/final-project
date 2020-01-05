<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\Fakecar($faker));


    return [
        'type'              => $faker->vehicleType,
        'fuel_type'         => $faker->vehicleFuelType,
        'model'             => $faker-> vehicle,
        'transmission'      =>$faker->vehicleGearBoxType,
        'doors'             =>$faker->vehicleDoorCount,
        'year'              => $faker->biasedNumberBetween(2000,2020, 'sqrt'),
        'price'             =>$faker->biasedNumberBetween(10000,100000,'sqrt'),

    ];
});

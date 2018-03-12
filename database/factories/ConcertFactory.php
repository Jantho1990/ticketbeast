<?php

use Faker\Generator as Faker;

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

$factory->define(App\Concert::class, function (Faker $faker) {
    return [
        'title' => 'The Stand-Ins',
        'subtitle' => 'with FakeMusicScene',
        'date' => \Carbon\Carbon::parse('+2 weeks'),
        'ticket_price' => 2000,
        'venue' => 'The Fake Arena',
        'venue_address' => '123 Example Lane',
        'city' => 'Fake City',
        'state' => 'NY',
        'zip' => '11111',
        'additional_information' => 'This is a fake concert.',
    ];
});

$factory->state(App\Concert::class, 'published', function (Faker $fakter) {
    return [
        'published_at' => \Carbon\Carbon::parse('-1 week')
    ];
});

$factory->state(App\Concert::class, 'unpublished', function (Faker $fakter) {
    return [
        'published_at' => null
    ];
});
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

// по дефолту
// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });


/* используем класс-модель NameModelForFactory для обращения к базе */
/* и собственно компонент Faker */
/* еспользование написанной функции следующее: */
$factory->define(App\NameModelForFactory::class, function (Faker $faker) {
    return [
        "title" => $faker->word,
        "text" => $faker->title,
    ];
});
// factory(App\NameModelForFactory::class, 5)->create();
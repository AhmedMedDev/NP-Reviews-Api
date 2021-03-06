<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use App\Models\IncorrectAnswer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\System;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(System::class, function (Faker $faker) {
    return [
        'Sname' => $faker->name,
    ];
});

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'Qname' => $faker->name,
        'system_id' => $faker->numberBetween(14,23),
    ];
});

$factory->define(Question::class, function (Faker $faker) {
    return [
        'Qcontent' => $faker->name,
        'quiz_id' => $faker->numberBetween(15,20),
    ];
});

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'Acontent' => $faker->name,
        'question_id' => $faker->numberBetween(1,12),
    ];
});

$factory->define(IncorrectAnswer::class, function (Faker $faker) {
    return [
        'IAcontent' => $faker->name,
        'question_id' => $faker->numberBetween(1,12),
    ];
});
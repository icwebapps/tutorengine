<?php

use App\Resource;
use App\Tutor;
use App\Student;
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

$factory->define(App\Assignment::class, function (Faker $faker) {
  $date_set = $faker->date;
  $date_due = strtotime('+7 days', strtotime($date_set));
  $tutor_id = factory(Tutor::class)->create()->user_id;
  return [
    'tutor_id' => $tutor_id,
    'student_id' => factory(Student::class)->create()->user_id,
    'subject' => str_random(20),
    'date_set' => $date_set,
    'date_due' => date('Y-m-d', $date_due),
    'completed' => $faker->boolean,
    'resource_id' => factory(Resource::class)->create([
      'tutor_id' => $tutor_id
    ]),
    'title' => str_random(10)
  ];
});
<?php
$factory('Larabook\Users\User', [
    'username'   => $faker->userName,
    'email'      => $faker->email,
    'password'   => $faker->word,
    'created_at' => $faker->date,
    'updated_at' => $faker->date,
]);

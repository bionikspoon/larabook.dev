<?php
$factory('Larabook\Statuses\Status', [
    'user_id'    => 'factory:Larabook\Users\User',
    'body'       => $faker->text(),
    'created_at' => $faker->date,
    'updated_at' => $faker->date,
]);

<?php

use JeroenNoten\LaravelNews\Models\Article;

$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'summary' => $faker->paragraph,
        'body' => $faker->paragraph
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        // Article::class 关联的模型
        // -> name 可以生成日语数据
        'title' => $faker -> company(),
        'user_id'       => rand(1,20),
        'desn' => $faker -> realText(20),        
        // 自己拼凑图片的位置
        'pic' => '/front/images/img_'.rand(1,4).'.jpg',
        // -> name 不能生成日语数据
        'body' => $faker -> realText(200),

    ];
});

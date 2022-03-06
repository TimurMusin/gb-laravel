<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id = null): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];

        if ($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 200),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(100)
            ];
        }

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $id = $i + 1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 200),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(100)
            ];
        };

        return $data;
    }
}

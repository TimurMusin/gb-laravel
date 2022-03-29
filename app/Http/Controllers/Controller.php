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

    // Урок 2. Задание 1.
    // Добавить в родительский контроллер методы для хранения данных,
    // которые будет возвращать массивы.
    // Массивы должны содержать информацию о категориях новостей (минимум 5),
    // и новостях (минимум 4 для каждой категории).

    private $news;

    public function __construct()
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $id = $i + 1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 200),
                'status' => $statusList[mt_rand(0, 2)],
                'category' => $this->getCategory(mt_rand(1, 5)),
                'description' => $faker->text(100)
            ];
        }
        $this->news = $data;
    }

    public function getCategory(?int $id = null)
    {
        $categories = ["Category1", "Category2", "Category3", "Category4", "Category5"];

        if ($id) {
            $id--;
            return $categories[$id];
        }

        return $categories;
    }

    public function getNews(?int $id = null)
    {
        $data = $this->news;

        if ($id) {
            return $data[++$id];
        }

        return $data;
    }

    public function getNewsByCategory(string $category)
    {
        $data = $this->news;
        $data = array_filter($data, function ($val) use ($category) {
            return $val['category'] == $category;
        });
        return $data;
    }
}

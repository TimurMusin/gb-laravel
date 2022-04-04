<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'category_id' => mt_rand(1, 5),
                'source_id' => mt_rand(1, 10),
                'title' => $faker->jobTitle(),
                'status' => $statusList[mt_rand(0, 2)],
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 200),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
}

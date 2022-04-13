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
        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'category_id' => mt_rand(1, DB::table('categories')->count()),
                'source_id' => mt_rand(1, DB::table('sources')->count()),
                'title' => $faker->realText(50),
                'status' => $statusList[mt_rand(0, 2)],
                'author' => $faker->name(),
                'image' => $faker->imageUrl(640, 480),
                'description' => $faker->realText(400)
            ];
        }
        return $data;
    }
}

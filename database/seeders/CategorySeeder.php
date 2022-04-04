<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $categories = ["Category1", "Category2", "Category3", "Category4", "Category5"];
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title' => $categories[$i],
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '寿司'
        ];
        Category::create($param);

        $param = [
            'name' => '焼肉'
        ];
        Category::create($param);

        $param = [
            'name' => '居酒屋'
        ];
        Category::create($param);

        $param = [
            'name' => 'イタリアン'
        ];
        Category::create($param);

        $param = [
            'name' => 'ラーメン'
        ];
        Category::create($param);
    }
}

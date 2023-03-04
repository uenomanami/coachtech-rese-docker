<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Closeddate;

class CloseddatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'store_id' => '1',
            'date' => '2023/03/01',
        ];
        Closeddate::create($param);

        $param = [
            'store_id' => '1',
            'date' => '2023/03/15',
        ];
        Closeddate::create($param);

        $param = [
            'store_id' => '1',
            'date' => '2023/03/22',
        ];
        Closeddate::create($param);

        $param = [
            'store_id' => '1',
            'date' => '2023/04/06',
        ];
        Closeddate::create($param);

        $param = [
            'store_id' => '1',
            'date' => '2023/04/20',
        ];
        Closeddate::create($param);

        $param = [
            'store_id' => '1',
            'date' => '2023/05/11',
        ];
        Closeddate::create($param);

        $param = [
            'store_id' => '1',
            'date' => '2023/05/25',
        ];
        Closeddate::create($param);
    }
}

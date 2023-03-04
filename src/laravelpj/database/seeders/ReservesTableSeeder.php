<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '3',
            'store_id' => '1',
            'num_of_people' => '5',
            'start_at' => '2023/02/01 20:00',
        ];
        Reserve::create($param);

        $param = [
            'user_id' => '3',
            'store_id' => '2',
            'num_of_people' => '3',
            'start_at' => '2023/03/31 20:00',
        ];
        Reserve::create($param);

        $param = [
            'user_id' => '4',
            'store_id' => '1',
            'num_of_people' => '5',
            'start_at' => '2023/02/01 21:00',
        ];
        Reserve::create($param);
    }
}

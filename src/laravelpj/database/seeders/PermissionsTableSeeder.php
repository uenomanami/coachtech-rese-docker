<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            // id = 1
            'name' => '利用者'
        ];
        Permission::create($param);

        $param = [
            // id = 2
            'name' => '店舗代表者'
        ];
        Permission::create($param);

        $param = [
            // id = 3
            'name' => '管理者'
        ];
        Permission::create($param);
    }
}

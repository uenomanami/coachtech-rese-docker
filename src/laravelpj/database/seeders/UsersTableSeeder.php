<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '管理者',
            'email' => 'aaa@example.com',
            'password' => Hash::make('test'),
            'permission_id' => '3',
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表者',
            'email' => 'bbb@example.com',
            'password' => Hash::make('test'),
            'permission_id' => '2',
        ];
        User::create($param);

        $param = [
            'name' => 'テストユーザー１',
            'email' => 'ccc@example.com',
            'password' => Hash::make('test'),
            'permission_id' => '1',
        ];
        User::create($param);

        $param = [
            'name' => 'テストユーザー2',
            'email' => 'ddd@example.com',
            'password' => Hash::make('test'),
            'permission_id' => '1',
        ];
        User::create($param);

        $param = [
            'name' => 'テストユーザー3',
            'email' => 'eee@example.com',
            'password' => Hash::make('test'),
            'permission_id' => '1',
        ];
        User::create($param);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ReservesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CloseddatesTableSeeder::class);
    }
}

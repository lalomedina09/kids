<?php

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

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(CategorySeeder::class);

        //$this->call(UserSeeder::class);
        //$this->call(RoleUserSeeder::class);
        //$this->call(PageSeeder::class);
    }
}

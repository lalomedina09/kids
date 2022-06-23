<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('cache')->forget('spatie.permission.cache');

        $roles = ['admin','staff','editor','reporter','demo','author','subscriptor'];

        foreach ($roles as $role_name) {
            $role = Role::where('name', $role_name)->first();
            $role = ($role) ?: new Role;
            $role->name = $role_name;
            $role->lang = "messages.roles.{$role_name}";
            $role->save();
        }
    }
}

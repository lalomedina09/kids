<?php

use Illuminate\Database\Seeder;

use App\Models\Permission;
use App\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('cache')->forget('spatie.permission.cache');

        $roles = Role::all();
        $permissions = Permission::all();


        $admin_role = $roles->first(function ($value, $key) {
            return $value->name === 'admin';
        });
        $admin_role->givePermissionTo($permissions->all());


        $staff_role = $roles->first(function ($value, $key) {
            return $value->name === 'staff';
        });
        $staff_roles_permissions = $permissions
            ->filter(function ($value, $key) {
                return preg_match("/(articles|videos|podcasts|courses|covers|pages|downloads|quotes|speakers|categories|reports|landings).*/", $value->name);
            })
            ->all();
        $staff_role->givePermissionTo($staff_roles_permissions);
        $staff_role->givePermissionTo(['blog.dashboard.show']);


        $editor_role = $roles->first(function ($value, $key) {
            return $value->name === 'editor';
        });
        $editor_role_permissions = $permissions
            ->filter(function ($value, $key) {
                return preg_match("/(articles|videos|podcasts|courses|covers|pages|downloads|quotes|speakers|categories).(index|read|update)/", $value->name);
            })
            ->all();
        $editor_role->givePermissionTo($editor_role_permissions);
        $editor_role->givePermissionTo(['blog.dashboard.show']);


        $reporter_role = $roles->first(function ($value, $key) {
            return $value->name === 'reporter';
        });
        $reporter_role_permissions = $permissions
            ->filter(function ($value, $key) {
                return preg_match("/(articles|videos|podcasts|courses|covers|pages|downloads|quotes|speakers|categories).(index|read)/", $value->name);
            })
            ->all();
        $reporter_role->givePermissionTo($reporter_role_permissions);
        $reporter_role->givePermissionTo(['blog.dashboard.show']);


        $author_role = $roles->first(function ($value, $key) {
            return $value->name === 'author';
        });
        $author_role_permissions = $permissions
            ->filter(function ($value, $key) {
                return preg_match("/(articles).(index|create|read|update|delete)/", $value->name);
            })
            ->all();
        $author_role->givePermissionTo($author_role_permissions);
        $author_role->givePermissionTo(['blog.dashboard.show']);

        /*
        $demo_role = $roles->first(function ($value, $key) {
            return $value->name === 'demo';
        });


        $subscriptor_role = $roles->first(function ($value, $key) {
            return $value->name === 'subscriptor';
        });
        */
    }
}

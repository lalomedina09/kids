<?php

use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('cache')->forget('spatie.permission.cache');

        $crud = [
            'all' => null,
            'index' => null,
            'create' => null,
            'read' => null,
            'update' => null,
            'delete' => null
        ];

        $permissions = [
            'blog' => [
                'dashboard' => [
                    'show' => null
                ],
                'authorization' => [
                    'index' => null,
                    'update' => null
                ],
                'articles' => array_add($crud, 'publish', null),
                'videos' => array_add($crud, 'publish', null),
                'podcasts' => array_add($crud, 'publish', null),
                'courses' => array_add($crud, 'publish', null),
                'covers' => $crud,
                'pages' => $crud,
                'downloads' => $crud,
                'quotes' => $crud,
                'speakers' => $crud,
                'users' => $crud,
                'categories' => $crud,
                'reports' => [
                    'index' => null,
                    'read' => null
                ],
                'landings' => $crud
            ]
        ];

        $permissions = array_keys(array_dot($permissions));

        foreach ($permissions as $permission_name) {
            $permission = Permission::where('name', $permission_name)->first();
            $permission = ($permission) ?: new Permission;
            $permission->name = $permission_name;
            $permission->lang = "messages.permissions.{$permission_name}";
            $permission->save();
        }
    }
}

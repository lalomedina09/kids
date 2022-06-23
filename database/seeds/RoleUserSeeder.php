<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'hola@queridodinero.com',
            'fernando@queridodinero.com',
            'miriam@queridodinero.com',
            'hector@queridodinero.com',
            'juancarlos@queridodinero.com',
            'marcelo@queridodinero.com',
            'aura@queridodinero.com',
            'pablo@queridodinero.com',
            'rene@queridodinero.com',
            'mauricio@queridodinero.com',
        ];

        $user = User::where('email', 'hola@queridodinero.com')->first();
        if ($user) {
            $user->assignRole('admin');
            $user->save();
        }

        $user = User::where('email', 'fernando@queridodinero.com')->first();
        if ($user) {
            $user->assignRole('admin');
            $user->save();
        }

        $user = User::where('email', 'miriam@queridodinero.com')->first();
        if ($user) {
            $user->assignRole('admin');
            $user->save();
        }

        $user = User::where('email', 'juancarlos@queridodinero.com')->first();
        if ($user) {
            $user->assignRole('admin');
            $user->save();
        }

        foreach ($users as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->assignRole('staff');
                $user->save();
            }
        }
    }
}

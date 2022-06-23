<?php

namespace Tests;

use App\Models\{ Role, User };
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param  array  $overrides
     * @return self
     */
    public function actingAsUser(array $overrides = [])
    {
        $user = factory(User::class)->create($overrides);

        return $this->actingAs($user);
    }

    /**
     * @param  array  $overrides
     * @return self
     */
    public function actingAsAdmin(array $overrides = [])
    {
        $user = factory(User::class)->create($overrides);

        $user->roles()->save(
            factory(Role::class)->states('admin')->create()
        );

        return $this->actingAs($user);
    }
}

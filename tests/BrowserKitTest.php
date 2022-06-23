<?php

namespace Tests;

use App\Models\{ Role, User };
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class BrowserKitTest extends BaseTestCase
{
    use CreatesApplication;

    /**
     * The base URL of the application.
     *
     * @var string
     */
    public $baseUrl = 'http://localhost';

    /**
     * Boot the testing helper traits.
     *
     * @return void
     */
    protected function setUpTraits()
    {
        parent::setUpTraits();

        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshDatabase::class])) {
            $this->refreshDatabase();
        }
    }

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

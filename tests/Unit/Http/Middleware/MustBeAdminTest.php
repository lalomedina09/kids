<?php

namespace Tests\Unit\Http\Middleware;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\MustBeAdmin;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MustBeAdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_throws_an_exception_for_non_admin_users()
    {
        $request = Request::create('/dashboard');

        $request->setUserResolver(function () {
            return new User;
        });
        $this->assertFalse($request->user()->isAdmin());

        try {
            (new MustBeAdmin)->handle($request, function () {
                // no-op
            });
        } catch (AuthorizationException $exception) {
            return;
        }

        $this->fail('It should have thrown an authorization exception for non admin users');
    }
}

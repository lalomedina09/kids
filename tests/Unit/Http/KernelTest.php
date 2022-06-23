<?php

namespace Tests\Unit\Http;

use Tests\TestCase;
use App\Http\Kernel;
use App\Http\Middleware\MustBeAdmin;

class KernelTest extends TestCase
{
    /** @test */
    public function it_defines_an_admin_route_middleware()
    {
        $middleware = resolve(KernelTestHelper::class)->routeMiddleware();

        $this->assertArrayHasKey('admin', $middleware);
        $this->assertEquals(MustBeAdmin::class, $middleware['admin']);
    }

    /** @test */
    public function it_defines_a_dashboard_middleware_group()
    {
        $groups = resolve(KernelTestHelper::class)->middlewareGroups();

        $this->assertArrayHasKey('dashboard', $groups);

        tap($groups['dashboard'], function ($group) {
            $this->assertContains('web', $group);
            $this->assertContains('auth', $group);
            $this->assertContains('admin', $group);
        });
    }

}

class KernelTestHelper extends Kernel
{
    /**
     * @return array
     */
    public function routeMiddleware() : array
    {
        return $this->routeMiddleware;
    }

    /**
     * @return array
     */
    public function middlewareGroups() : array
    {
        return $this->middlewareGroups;
    }
}

<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Traits\Sluggable;

class RoleTest extends TestCase
{
    /** @test */
    public function it_defines_an_admin_name_constant()
    {
        $this->assertEquals('Administrator', Role::ADMIN);
    }

    /** @test */
    public function it_is_sluggable()
    {
        $role = new Role;

        $this->assertArrayHasKey(Sluggable::class, class_uses($role));
        $this->assertEquals('name', $role->generateSlugsFrom());
        $this->assertEquals('slug', $role->saveSlugsTo());
    }

    /** @test */
    public function it_does_not_have_timestamps()
    {
        $role = new Role;

        $this->assertFalse($role->usesTimestamps());
    }
}

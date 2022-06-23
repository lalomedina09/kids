<?php

namespace Tests\Unit\Models\Presenters;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPresenterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_presents_the_user_name()
    {
        $user = (new User)->setAttribute('name', 'JOHN');

        $this->assertEquals('John', $user->present()->name);
    }

    /** @test */
    public function it_presents_the_user_last_name()
    {
        $user = (new User)->setAttribute('last_name', 'Doe');

        $this->assertEquals('Doe', $user->present()->last_name);
    }

    /** @test */
    public function it_presents_the_user_age()
    {
        $user = (new User)->setAttribute('age', null);
        $this->assertEquals('-', $user->present()->age);
    }

    /** @test */
    public function it_presents_the_user_occupation()
    {
        $user = new User;
        $this->assertEquals('-', $user->present()->occupation);

        $user = $user->setAttribute('occupation', 'Software developer');
        $this->assertEquals('Software developer', $user->present()->occupation);
    }

    /** @test */
    public function it_presents_the_user_city()
    {
        $user = new User;
        $this->assertEquals('-', $user->present()->city);

        $user = $user->setAttribute('city', 'Laraland');
        $this->assertEquals('Laraland', $user->present()->city);
    }

    /** @test */
    public function it_presents_the_user_first_login()
    {
        $user = (new User)->setAttribute('first_login', '2016-02-27');

        $this->assertEquals('Febrero 27, 2016', $user->present()->first_login);
    }

    /** @test */
    public function it_presents_the_user_last_login()
    {
        $user = (new User)->setAttribute('last_login', '2016-02-27');

        $this->assertEquals('Febrero 27, 2016', $user->present()->last_login);
    }

    /** @test */
    public function it_presents_the_user_created_at()
    {
        $user = (new User)->setAttribute('created_at', '2016-02-27');

        $this->assertEquals('Febrero 27, 2016', $user->present()->created_at);
    }

    /** @test */
    public function it_presents_the_user_deleted_at()
    {
        $user = (new User)->setAttribute('deleted_at', '2016-02-27');

        $this->assertEquals('Febrero 27, 2016', $user->present()->deleted_at);
    }

    /** @test */
    public function it_presents_the_user_avatar()
    {
        $user = (new User)->setAttribute('email', 'john@example.com');
        $hash = md5('john@example.com');

        $this->assertEquals("https://www.gravatar.com/avatar/{$hash}?s=20&d=mm", $user->present()->avatar);
    }
}

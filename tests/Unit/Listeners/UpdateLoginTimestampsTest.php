<?php

namespace Tests\Unit\Listeners;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use App\Listeners\UpdateLoginTimestamps;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateLoginTimestampsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_the_first_and_last_login_timestamps()
    {
        Carbon::setTestNow('now');

        $user = factory(User::class)->create();
        $event = new Login(Auth::guard(), $user, $remember = false);

        (new UpdateLoginTimestamps)->handle($event);

        tap($user->fresh(), function ($user) {
            $this->assertEquals((string) Carbon::getTestNow(), $user->first_login);
            $this->assertEquals((string) Carbon::getTestNow(), $user->last_login);
        });
    }

    /** @test */
    public function it_only_updates_the_last_login_if_the_first_login_is_already_set()
    {
        Carbon::setTestNow('now');

        $user = factory(User::class)->create([
            'first_login' => null,
            'last_login' => null,
        ]);
        $event = new Login(Auth::guard(), $user, $remember = false);

        (new UpdateLoginTimestamps)->handle($event);

        tap($user->fresh(), function ($user) {
            $this->assertEquals((string) Carbon::getTestNow(), $user->first_login);
            $this->assertEquals((string) Carbon::getTestNow(), $user->last_login);
        });
    }

    /** @test */
    public function first_login_is_only_set_one_time()
    {
        Carbon::setTestNow('now');

        $user = factory(User::class)->create([
            'first_login' => '2017-01-01 00:00:00',
            'last_login' => '2017-01-01 00:00:00',
        ]);
        $event = new Login(Auth::guard(), $user, $remember = false);

        (new UpdateLoginTimestamps)->handle($event);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('2017-01-01 00:00:00', $user->first_login);
            $this->assertEquals((string) Carbon::getTestNow(), $user->last_login);
        });
    }
}

<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{ Role, User };
use App\Notifications\ResetPassword;
use App\Models\Presenters\UserPresenter;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $user = new User;

        $this->assertEquals([
            'name',
            'last_name',
            'email',
            'age',
            'city',
            'occupation',
            'birthday',
            'gender',
            'interest',
            'password',
            'first_login',
            'last_login',
        ], $user->getFillable());
    }

    /** @test */
    public function it_has_hidden_fields()
    {
        $user = new User;

        $this->assertEquals(['password', 'remember_token'], $user->getHidden());
    }

    /** @test */
    public function it_has_dates_fields()
    {
        $user = new User();

        $this->assertArraySubset(['first_login', 'last_login'], $user->getDates());
    }

    /** @test */
    public function it_has_casteable_fields()
    {
        $user = new User;

        $this->assertArraySubset(['age' => 'integer'], $user->getCasts());
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $user = new User;

        $this->assertContains(SoftDeletes::class, class_uses($user));
        $this->assertContains('deleted_at', $user->getDates());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new User)->present();

        $this->assertInstanceOf(UserPresenter::class, $presenter);
    }

    /** @test */
    public function it_overrides_the_reset_password_notification()
    {
        Notification::fake();

        $user = new User;
        $user->sendPasswordResetNotification('SomeRandomString');

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /** @test */
    public function it_belongs_to_many_roles()
    {
        $user = (new User)->setAttribute('id', 42);

        $relation = $user->roles();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf(Role::class, $relation->getRelated());
        $this->assertEquals('user_role', $relation->getTable());
        $this->assertTrue($relation->withTimestamps);
    }

    /** @test */
    public function it_knows_if_it_is_an_admin()
    {
        $user = factory(User::class)->create();

        $this->assertFalse($user->isAdmin());

        $role = factory(Role::class)->states('admin')->create();
        $user->roles()->save($role);

        $this->assertTrue($user->fresh()->isAdmin());
    }

    /** @test */
    public function it_belongs_to_many_articles()
    {
        $article = new User;

        $relation = $article->articles();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphToMany::class, $relation);
        $this->assertInstanceOf(\App\Models\Article::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('userable_type', $relation->getMorphType());
    }

    /** @test */
    public function it_belongs_to_many_videos()
    {
        $article = new User;

        $relation = $article->videos();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphToMany::class, $relation);
        $this->assertInstanceOf(\App\Models\Video::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('userable_type', $relation->getMorphType());
    }

    /** @test */
    public function it_belongs_to_many_podcasts()
    {
        $article = new User;

        $relation = $article->podcasts();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphToMany::class, $relation);
        $this->assertInstanceOf(\App\Models\Podcast::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('userable_type', $relation->getMorphType());
    }
}

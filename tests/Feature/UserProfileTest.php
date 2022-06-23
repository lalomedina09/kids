<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\BrowserKitTest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function user_can_browse_to_the_profile_view()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/perfil')
             ->seeText('perfil')
             ->see($user->name);
    }

    /** @test */
    public function users_can_edit_their_profile()
    {
        Bus::fake();

        $user = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'occupation' => 'Software Developer',
            'city' => 'México',
        ]);

        $this->actingAs($user)
             ->visit('/perfil')
             ->attach(UploadedFile::fake()->image('photo.jpg'), 'profile_photo')
             ->type('John Updated', 'name')
             ->type('updated@example.com', 'email')
             ->type('City updated', 'city')
             ->press('Actualizar')
             ->seePageIs('/perfil')
             ->seeText(htmlentities('Se actualizó la información correctamente.'));

        tap($user->fresh(), function ($user) {
            $this->assertEquals('John Updated', $user->name);
            $this->assertEquals('updated@example.com', $user->email);
            $this->assertEquals('City updated', $user->city);
        });
    }
}

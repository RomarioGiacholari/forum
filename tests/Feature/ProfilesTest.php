<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilesTest extends TestCase
{

    use DatabaseTransactions;

    /** @test */
    public function a_user_has_a_profile()
    {
        $user = create('App\User', ['name' => 'JohnDoeJunior']);

        $this->get("/profiles/{$user->name}")
            ->assertSee('JohnDoeJunior');
    }

    /** @test */
    public function profiles_display_all_threads_created_by_the_associated_user()
    {
        $user = create('App\User');

        $thread = create('App\Thread', ['user_id' => $user->id]);

        $this->get("/profiles/{$user->name}")
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

}

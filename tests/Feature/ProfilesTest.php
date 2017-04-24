<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilesTest extends TestCase
{


    /** @test */
    public function a_user_has_a_profile()
    {
        $user = create('App\User');

        $this->get('/profiles/{{$user->name}}')
             ->assertSee($user->name);
    }

}

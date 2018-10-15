<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FavoritesTest extends TestCase
{

    use DatabaseTransactions;

    /** @test */
    public function guests_cannot_favorite_anything()
    {
        $this->withExceptionHandling()
            ->post('replies/1/favorites')
            ->assertRedirect('/login');
    }


    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();

        $reply = create('App\Reply');

        $this->post('replies/' . $reply->id . '/favorites');

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply_once()
    {
        $this->signIn();

        $reply = create('App\Reply');

        try {

            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');

        } catch (\Exception $e) {

            $this->fail('Did not excpet to insert the same record set twice');

        }

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_can_dislike_any_reply()
    {

        //sign in a user
        $this->signIn();

        //create a reply
        $reply = create('App\Reply');

        //prepare the endpoint
        $endpoint = 'replies/' . $reply->id . '/favorites';

        //post to the endpoint == like the reply
        $this->post($endpoint);

        $this->assertCount(1, $reply->favorites);

        //delete to the endpoint == dilsike the reply
        $this->delete($endpoint);

        $this->assertCount(0, $reply->fresh()->favorites);

    }


}

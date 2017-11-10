<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadsTest extends TestCase
{


 use DatabaseTransactions;

    public function setUp(){

        parent::setUp();

        $this->thread = create('App\Thread');

    }

    /** @test*/
    public function a_user_can_browse_threads()
    {

        $response = $this->get('/threads');

        $response->assertSee($this->thread->title);
   }
     /** @test*/
    public function a_user_can_read_a_single_thread()
    {

        
        $response = $this->get($this->thread->path());

        $response->assertSee($this->thread->title);
    }

    /** @test*/
    public function a_user_can_read_replies_that_are_associated_with_the_thread()
    {
        $reply = create('App\Reply',['thread_id' => $this->thread->id]);

    
        $response = $this->get($this->thread->path());

        $response->assertSee($reply->body);
    }

    /** @test*/
    public function a_user_can_filter_according_to_a_tag()
    {
        $channel = create('App\Channel');

        $threadInChannel = create('App\Thread', ['channel_id' => $channel->id]);

        $threadNotInChannel = create('App\Thread');

        $this->get('/threads/' . $channel->slug)
             ->assertSee($threadInChannel->body)
             ->assertDontSee($threadNotInChannel->body);
    }

    /** @test*/
    public function a_user_can_filter_threads_by_any_username()
    {
       $this->signIn(create('App\User', ['name' => 'JohnDoe']));

       $threadsByJohn = create('App\Thread', ['user_id' => auth()->id()]);

       $threadsNotByJohn = create('App\Thread');

       $this->get('threads?by=JohnDoe')
            ->assertSee($threadsByJohn->body)
            ->assertDontSee($threadsNotByJohn->body);
    }

    /** @test*/
    public function a_user_can_filter_threads_by_popularity()
    {

        $threadWithTwoReplies = create('App\Thread');
        create('App\Reply', ['thread_id' => $threadWithTwoReplies->id], 2);

        $threadWithThreeReplies = create('App\Thread');
        create('App\Reply', ['thread_id' => $threadWithThreeReplies->id], 3);

        $response = $this->getJson('/threads?popular=1')->json();
        $this->assertEquals([3,2,0], array_column($response,'replies_count'));
    }
}

<?php



namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

Class ThreadsTest extends TestCase 
{

	
	use DatabaseTransactions;

	protected $thread;

	public function setUp()
	{

		parent::setUp();

		$this->thread = create('App\Thread');
	}

	/** @test */
	public function a_thread_has_replies()
	{


		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
	}

	/** @test */
	public function a_thread_has_a_creator()
	{


		$this->assertInstanceOf('App\User', $this->thread->creator);
	}

	/** @test */
	public function a_thread_can_add_a_reply()
	{

		$this->thread->addReply([

			'body'=> 'Foobar',
			'user_id' => 1

			]);
		$this->assertCount(1,$this->thread->replies);
	}

	/** @test */
	public function a_thread_belongs_ta_a_channel()
	{

		$thread = create('App\Thread');

		$this->assertInstanceOf('App\Channel' , $thread->channel);

	}

	/** @test */
	public function a_thread_can_make_a_string_path()
	{

		$thread = create('App\Thread');

		$this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}",$thread->path());
	}


}
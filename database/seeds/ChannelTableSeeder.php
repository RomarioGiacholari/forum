<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([

            'name' => 'art',
            'slug' => 'art'
        ]);
    }
}

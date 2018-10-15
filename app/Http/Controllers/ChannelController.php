<?php

namespace App\Http\Controllers;

use App\Channel;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Channel $channel
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel)
    {
        $threads = $channel->threads()->latest()->with('creator', 'channel')->get();

        return view('threads.index', compact('threads'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;
use App\Mail\UserReplied;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($channel_id, Thread $thread)
    {
        $this->validate(request(), [

            'body' => 'required|max:255',

            ]);
        
        $reply = $thread->addReply([

            'body' => request('body'),
            'user_id' => auth()->id()

            ]);

        if(! $thread->creator->id == auth()->id()){

            \Mail::to($thread->creator->email)->send(new UserReplied($thread,auth()->user()));
        }

        
         if (request()->expectsJson()) {
                return $reply->load('owner');
        }

        return back()->with('flash','Your reply has been submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        // $this->authorize('update', $reply);

        // return view('replies.edit',compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        $this->authorize('update', $reply);

        $this->validate($request, [

            'body' => 'required|max:255',

            ]);

        $reply->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);
        
        $reply->delete();

    }
}

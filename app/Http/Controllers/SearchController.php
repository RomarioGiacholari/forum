<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class SearchController extends Controller
{
    public function search()
    {
        $keyword = request('q');

        $threads = Thread::where('title','ilike',"%$keyword%")->get();

        return view('threads.index',compact('threads'));
    }
}

@extends('layouts.app')
@section('content')
<div class="container">
    <section id="pinBoot">
        @forelse($threads as $thread)
                <div class="white-panel">
                    <div class ='level'>
                        <div class='flex'>
                            <h4><strong><a href = "{{$thread->path()}}">{{$thread->title}}</a></strong></h4>
                            <a style="color:#E0000F" href= "{{$thread->path()}}">Answer <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                            Topic: <span class="{{$thread->channel->name}}">{{$thread->channel->name}}</span>
                        </div>
                        <div>
                            {{$thread->replies_count}}  <i class="fa fa-comment" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p id="thread-text">{{$thread->body}}</p>
                    </div>
                    <a href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a>
                </div>
        @empty
            <p>There are no posts yet listed for this category.</p>
        @endforelse
       </section>
       <!-- <a href="/threads/create" class="btn btn-default" role="button" style =' position: fixed;bottom: 0;right: 0;width:100%;font-size:1em;opacity:0.9;color:black'>Post a Question</a> -->
</div>
@endsection
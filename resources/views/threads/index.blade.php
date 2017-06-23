@extends('layouts.app')

@section('content')

<div class="container">
    <section id="pinBoot">
    @forelse($threads as $thread)
            <div class="white-panel">
                <div class ='level'>
                 <div class='flex'>
                  <h4><strong><a style='color:black' href = "{{$thread->path()}}">{{$thread->title}}</a></strong></h4>
                   <a style="color:#E0000F" href= "{{$thread->path()}}">Answer <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                   Topic: <a class="{{$thread->channel->name}}" href="/threads/{{$thread->channel->slug}}">{{$thread->channel->name}}</a>
                 </div>
                 <a href="{{$thread->path()}}">
                 {{$thread->replies_count}} <i class="fa fa-reply" aria-hidden="true"></i>
                 </a>
                </div>
                <div class="panel-body">
                   <p id="thread-text">{{$thread->body}}</p>
                </div>
            </div>
        @empty
        <blockquote>There are no posts yet listed for this category.</blockquote>
        @endforelse
       </section>

       <!-- <a href="/threads/create" class="btn btn-default" role="button" style =' position: fixed;bottom: 0;right: 0;width:100%;font-size:1em;opacity:0.9;color:black'>Post a Question</a> -->
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @forelse($threads as $thread)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class ='level'>
                 <h3 class='flex'>
                  <a style='color:black' href = "{{$thread->path()}}">{{$thread->title}}</a>
                 </h3>
                 <a href="{{$thread->path()}}">
                 {{$thread->replies_count}} <i class="fa fa-reply" aria-hidden="true"></i>
                 </a>
                </div>
                </div>
                <div class="panel-body">
                   <p>{{$thread->body}}</p>
                   <p ><a style="color:#E0000F" href= "{{$thread->path()}}">Answer <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                   <strong >Topic:</strong> <a class="{{$thread->channel->name}}" href="/threads/{{$thread->channel->slug}}">{{$thread->channel->name}}</a></p>
                </div>
            </div>
        </div>
        @empty
        <blockquote>There are no posts yet listed for this category.</blockquote>
        @endforelse

       <!-- <a href="/threads/create" class="btn btn-default" role="button" style =' position: fixed;bottom: 0;right: 0;width:100%;font-size:1em;opacity:0.9;color:black'>Post a Question</a> -->
</div>
@endsection
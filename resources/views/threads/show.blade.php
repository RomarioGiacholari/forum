@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 style='overflow:hidden;'>
                <a href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a> <span style="color:black;">posted:</span>
                {{$thread->title}}
                </h3>
                </div>
            <div class="panel-body">
                   <strong>{{$thread->body}}</strong>
                </div>

            </div>
     
       @foreach($replies as $reply)
            @include('threads.reply')
        @endforeach
     
        {{$replies->links()}}

      @if(auth()->check())
            <form action = "{{$thread->path() .'/replies'}}" method = 'POST'>

            {{ csrf_field() }}

            <div class = 'form-group'>
            <textarea name ='body' id ='body' class ='form-control' placeholder="Have something to say?" rows="5" required=""></textarea>
            </div>

            <div class = 'form-group'>
            <button type ='submit' class ="btn btn-primary btn-block form-control">Post</button>
            </div>

            </form>

             @if(count($errors))
                        <ol class ="text-center" >
                        @foreach($errors->all() as $error)
                            <p style='color:red'>{{$error}}</p>
                        @endforeach
                        </ol>
             @endif
     
        @else

    <a href="{{route('login')}}"><strong><u><p class ='text-center'>Please sign in to participate in this discussion</p></u></strong></a>

    @endif
   </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                  <p>
                  The thread was published {{$thread->created_at->diffForHumans()}} by <a href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a>, and currently has {{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}}.
                  </p>
                </div>
            </div>
        </div>
</div>

@endsection
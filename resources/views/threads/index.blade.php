@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach($threads as $thread)
        <div class="col-md-6 col-sm-6  col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class ='level'>
                 <h3 class='flex'>
                  <a style='color:black' href = "{{$thread->path()}}">{{$thread->title}}</a>
                 </h3>
                 <a href="{{$thread->path()}}" style='color:black'>
                 <strong>{{$thread->replies_count}} {{str_plural('reply',$thread->replies->count())}}</strong>
                 </a>
                </div>
                </div>
                <div class="panel-body">
                    
                    	<blockquote style ='overflow:hidden'>
                    		<div>{{$thread->body}}</div>
                    	</blockquote>

                        <hr>
                   <p ><a style="color:#E0000F" href= "{{$thread->path()}}">Answer</a></p>
                   <p><strong>Topic:</strong> <a href="/threads/{{$thread->channel->slug}}">{{$thread->channel->name}}</a></p>
                </div>
            </div>
        </div>
        @endforeach 

       <!-- <a href="/threads/create" class="btn btn-default" role="button" style =' position: fixed;bottom: 0;right: 0;width:100%;font-size:1em;opacity:0.9;color:black'>Post a Question</a> -->
</div>
@endsection
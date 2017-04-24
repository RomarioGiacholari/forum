@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach($threads as $thread)
        <div class="col-md-8 col-sm-6  col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class ='level'>
                 <h3 class='flex'>
                  <a style='color:black' href = "{{$thread->path()}}">{{$thread->title}}</a>
                 </h3>
                 <a href="{{$thread->path()}}">
                 <strong>{{$thread->replies_count}} {{str_plural('reply',$thread->replies->count())}}</strong>
                 </a>
                </div>
                </div>
                <div class="panel-body">
                    
                    	<blockquote>
                    		<div>{{$thread->body}}</div>
                    	</blockquote>

                        <hr>
                   <p ><a style="color:#E0000F" href= "{{$thread->path()}}">Answer</a></p>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>
@endsection
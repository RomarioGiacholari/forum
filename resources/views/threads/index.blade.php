@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach($threads as $thread)
        <div class="col-md-8 col-sm-6  col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class ='level'>
                 <h4 class='flex'>
                  <a href = "{{$thread->path()}}">{{$thread->title}}</a>
                 </h4>
                 <a href="{{$thread->path()}}">
                 <strong>{{$thread->replies_count}} {{str_plural('reply',$thread->replies->count())}}</strong>
                 </a>
                </div>
                </div>
                <div class="panel-body">
                    
                    	<article>
                    		<div>{{$thread->body}}</div>
                    	</article>

                        <hr>
                   
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>
@endsection
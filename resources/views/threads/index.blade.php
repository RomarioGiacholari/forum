@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach($threads as $thread)
        <div class="col-md-4 col-sm-6  col-md-offset-0" style ='height:300px'>
            <div class="panel panel-default">
                <div class="panel-heading">
                 <h4>
                  <a href = "{{$thread->path()}}">{{$thread->title}}</a>
                 </h4>
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
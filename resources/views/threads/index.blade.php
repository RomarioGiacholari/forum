@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach($threads as $thread)
        <div class="col-md-4 col-md-offset-0" style ='height:280px'>
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
    <div class="row">
        <div class="col-md-8 col-md-offset-3" style="padding-top:100px">
    {{ $threads->links() }}
    </div>
</div>



@endsection
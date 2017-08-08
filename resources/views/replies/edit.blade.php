@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
 <h3><strong>Update a reply</strong></h3>

 <hr>

<div class="panel panel-default">
   <div class="panel-heading">
     <div class="level">
     	<h5 class ="flex">
        	<a href="{{route('profile', $reply->owner)}}" >{{$reply->owner->name}}</a> said {{$reply->created_at->diffForHumans()}} ...
        </h5>
		     <div>
		     	
			     <form method='POST' action="/replies/{{$reply->id}}/favorites">
			     	{{csrf_field()}}

			     	 <button type ='submit' class ='btn btn-primary btn-sm ' {{$reply->isFavorited() ? 'disabled' : '' }}>
			     	 	
			     	 {{$reply->favorites()->count()}} {{str_plural('like',$reply->favorites()->count())}}

			     	 </button>

			     </form>

		     </div>
     	</div>
     </div>	

  	<form action="{{route('update_reply',$reply->id)}}" method="POST">
                        {{csrf_field()}}
	                        {{method_field('PATCH')}}
	     <div class="panel-body">
	        <textarea class="form-control" name="body" id="body" rows="4" required>{{$reply->body}}</textarea>
	     </div>

	     <div class ='form-group'>
	        <button type="submit" class="btn btn-primary btn-block ">Update</button>
	     </div>
     </form>

      @if(count($errors))
 
                        <ol class ="text-center" >
                        @foreach($errors->all() as $error)
                            <p style='color:red'>{{$error}}</p>
                        @endforeach
                        </ol>
       @endif

 </div>
 </div>
 </div>
 </div>

@endsection
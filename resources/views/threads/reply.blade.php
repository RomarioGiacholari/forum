<div class="panel panel-default">
   <div class="panel-heading">
     <div class="level">
     	<h5 class ="flex">
        	<a href="{{route('profile', $reply->owner)}}" >{{$reply->owner->name}}</a> said {{$reply->created_at->diffForHumans()}} ...
        </h5>
		     <div>
             @if(auth()->check())
			     <form method='POST' action="/replies/{{$reply->id}}/favorites">
			     	{{csrf_field()}}
                     
			     	 <button type ='submit' class ='btn btn-primary btn-sm ' {{$reply->isFavorited() ? 'disabled' : '' }}>
                      
			     	 {{$reply->favorites()->count()}} <i class="fa fa-heart" aria-hidden="true"></i>

			     	 </button>

			     </form>
                 @endif
		     </div>
     	</div>
     </div>	


     <div class="panel-body">
        {{$reply->body}}
     </div>
     @can('update',$reply)
                <div class="panel-footer">
                    <form action="{{route('delete_reply',$reply->id)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                   <a href="#" onclick="$(this).closest('form').submit()" style="color:red">delete</a>
                    </form>
                    <a href="{{route('edit_reply',$reply->id)}}">edit</a>
                </div>
       @endcan

 </div>
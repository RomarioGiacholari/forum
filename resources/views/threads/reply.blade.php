<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="{{route('profile', $reply->owner)}}">{{$reply->owner->name}}</a>
                said {{$reply->created_at->diffForHumans()}} ...
            </h5>
            <div>
            @if(auth()->check())
                <!-- favorite vue component -->
                    <favorite :reply="{{ $reply }}"></favorite>
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
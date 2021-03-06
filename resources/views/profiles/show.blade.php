@extends('layouts.app')
@section('title', $profileUser->name)
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{$profileUser->name}}
                <small>activity since {{$profileUser->created_at->diffForHumans()}}</small>
            </h1>
        </div>
        @foreach($threads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <span class="flex" style="color:black;">
                        <a href="#"><strong>{{$thread->creator->name}}</strong></a> posted:
                        <a href="{{$thread->path()}}">{{$thread->title}}</a>
                        </span>
                        <span> {{$thread->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                <div class="panel-body">
                    {{$thread->body}}
                </div>
                @can('update',$thread)
                    <div class="panel-footer">
                        <form action="{{route('delete_thread',$thread->id)}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <a href="#" onclick="$(this).closest('form').submit()" style="color:red">delete</a>
                        </form>
                        <a href="{{route('edit_thread',$thread->id)}}">edit</a>
                    </div>
                @endcan
            </div>
        @endforeach
        {{$threads->links()}}
    </div>

@endsection
@extends('layouts.app')
@section('title', $thread->title)
@section('content')
<thread-view :thread="{{ $thread }}" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style='overflow:hidden;'>
                            <a href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a> <span
                                    style="color:black;">posted:</span>
                            {{$thread->title}}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <strong>{{$thread->body}}</strong>
                    </div>
                </div>
                <replies :data="{{ $thread->replies }}"
                     @removed="repliesCount--"
                     @added="repliesCount++"     
                >
                </replies>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            The thread was published {{$thread->created_at->diffForHumans()}} by <a
                                    href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a>, and
                            currently has <span v-text="repliesCount"></span> {{str_plural('comment', $thread->replies_count)}}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</thread-view>
@endsection
@extends('layouts.app')

@section('content')
<body style="background-color: white">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 ">
                <h3><strong>Update question</strong></h3>
                <hr>
                     
                    <form action="{{route('update_thread',$thread->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-group {{ $errors->has('channel_id') ? ' has-error' : '' }}">
                         <label for="channel_id">Pick a channel</label>
                         <select name='channel_id' id ='channel_id' class="form-control" required="">
                           <option value="{{$thread->channel->id}}">{{$thread->channel->name}}</option>
                            @foreach($channels as $channel)
                            <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? 'selected' : '' }}>{{$channel->name}}</option>
                            @endforeach
                            </select>
                        </div>


                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                         <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value ="{{$thread->title}}" required="">
                        </div>

                        <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                         <label for="body">Body:</label>
                            <textarea  class="form-control" name="body" id="body" rows="8" required="">{{$thread->body}}</textarea>
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
</body>
@endsection
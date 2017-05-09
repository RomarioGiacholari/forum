@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h1>Create a New Thread </h1>
                     
                    <form action="/threads" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                         <label for="channel_id">Pick a channel</label>
                         <select name='channel_id' id ='channel_id' class="form-control" required="">
                         <option value="">Choose One</option>
                            @foreach($channels as $channel)
                            <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? 'selected' : '' }}>{{$channel->name}}</option>
                            @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                         <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value ="{{old('title')}}" required="">
                        

                        <div class="form-group">
                         <label for="body">Body:</label>
                            <textarea  class="form-control" name="body" id="body" rows="8" required="">{{old('body')}}</textarea>
                            </div>
                        </div>

                        <div class ='form-group'>
                        <button type="submit" class="btn btn-primary ">Publish</button>
                        </div>
                     </form>

                     @if(count($errors))
 
                        <ol class ="alert alert-danger text-center" >
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                        </0l>

                     @endif

            </div>
    </div>
    </div>

@endsection
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron">
    <h1>Welcome to Discusslab</h1>
    <hr> 
    <p>Discusslab.com is a place that you can <b>discuss</b> about different <b>topics</b> with other people. It is kinda like <b>Quoara</b> Any replies left to 
    any thread could be liked and disliked. You can <b>post any number of questions</b> and some of your peers will try to answer that.
    </p> 
    <a href="/register" class="btn btn-primary" role="button" title="register for an account">Sign up</a>
    <a href="/threads"  class="btn btn-success" role="button" title="view discussions">Discussions</a>
  </div>
</div>
@endsection
<div class="panel panel-default">
   <div class="panel-heading">
     <a href="#">{{$reply->owner->name}}</a> <span style="color:#00FF00">said</span> {{$reply->created_at->diffForHumans()}} ...
     </div>
     <div class="panel-body">
        {{$reply->body}}
     </div>
 </div>
<div id="mySidenav">
    <a href="/threads/create" class="ask-button w3-bar-item w3-button" title="post a question"><i class="fa fa-comment"></i></a>
  </div>

  <div class="w3-container navbar navbar-fixed-top" >
  <div class="w3-bar w3-light-grey w3-border w3-large">
    <a href="/threads" class="w3-bar-item w3-button w3-black" title="home page"><i class="fa fa-home"></i></a>
    <a href ='#' class="w3-bar-item w3-button" data-toggle="modal" data-target="#exampleModalLong" aria-hidden="true" title="information about the page"><i class="fa fa-info" ></i></a>
    <!-- <a href ='#' class="w3-bar-item w3-button" data-toggle="modal" data-target="#searchModalLong" aria-hidden="true" title="search"><i class="fa fa-search" ></i></a> -->
    <div class="w3-dropdown-click" title="browse topics">
        <button onclick="toggleCaret()"class="w3-button"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          @foreach($channels as $channel)
          <a href="/threads/{{$channel->slug}}" class=" {{$channel->slug}} w3-bar-item w3-button"><i></i>{{$channel->name}}</a>
         @endforeach
        <a href="/threads?popular=1" class="w3-bar-item w3-button">popular</a>
        <a href="/threads" class="w3-bar-item w3-button">all threads</a>
        </div>
      </div>
    @if(auth()->check())
    <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fa fa-user"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="/threads?by={{auth()->user()->name}}" class="w3-bar-item w3-button" title="see your threads"><i>my</i></a>
        <a href="{{route('profile', auth()->user()->name)}}" class="w3-bar-item w3-button" title="profile"><i>profile</i></a>
        <a href="/threads/create" class="w3-bar-item w3-button"><i class="fa fa-comment" title="post a question"></i></a>
        </div>
      </div>
  @endif
  @if(Auth::guest())
    <a href="{{ route('login') }}" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i></a>
    <a href="{{ route('register') }}" class="w3-bar-item w3-button"><i>register</i></a>
    @else

  <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      
      {{ csrf_field() }}
    </form>

    @endif
  </div>
  </div>
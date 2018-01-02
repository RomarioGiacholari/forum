
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <!-- favicon icon link -->
     <link rel="icon" href="{{ asset('discusslab.png') }}" type="image/gif" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <title>{{ config('app.name', 'Forum') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
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
     <div id="app">
       @yield('content') 
      <!-- Vue flash component -->
        <flash message="{{ session('flash') }}"></flash>
      <!-- modal partial -->
        @include('partials.modal')
        @include('partials.searchModal')
      </div>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
      <script type="text/javascript">
      
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-90120268-2', 'auto');
      ga('send', 'pageview');


      function toggleCaret() {
          var x = document.querySelector(".w3-dropdown-content");
          if (x.className.indexOf("w3-show") == -1) {  
              x.className += " w3-show";
          } else { 
              x.className = x.className.replace(" w3-show", " ");
          }
        }
      
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <!-- favicon icon link -->
    <link rel="icon" href="{{ asset('discusslab.png') }}" type="image/gif" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <title> @yield('title') - Discusslab </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'signedIn' => Auth::check(),
            'user' => Auth::user()
        ]) !!};
    </script>
    <script data-ad-client="ca-pub-6808201610334190" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>

<!-- Navbar -->
@include('partials.navbar')

<div id="app">
@yield('content')

    <!-- Vue flash component -->
    <flash message="{{ session('flash') }}"></flash>

    <!-- modal partial -->
    @include('partials.modal')

    <div class="text-center p-2" style="margin-top:150px">
        <small>
            &copy; discusslab 2019 | <a href="{{ route('privacy-policy.index') }}">privacy</a>
        </small>
    </div>

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

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

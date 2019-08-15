<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

    <title>lynxproject</title>
</head>
<body id="index-body" onload="startTime()">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-sm navbar-dark bg-secondary fixed-top" id="main-nav">
    <div class="container">
        <a id="navBrand" href="/" class="navbar-brand">
            lynxproject</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                @if($user = Auth::user())
                    <li class="nav-item pr-2">
                        <a href="{{ route('home') }}" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="vl d-none d-sm-block"></div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle mr-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-block dropdown-item">Logout</button>
                                </form>

                            </div>
                        </div>
                    </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- CONTENT -->
<div id="content">
    @yield('content')
</div>

@include('footer.footer')

{{--LIVE CLOCK--}}
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        m = checkTime(m);
        document.getElementById('txt').innerHTML =
            h + ":" + m;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
</script>

</body>
</html>
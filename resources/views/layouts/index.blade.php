<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <title>lynxproject</title>
</head>
<body id="index-body">
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
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#registerModal">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- CONTENT -->
<div id="content">
    @yield('content')
</div>

<!-- FOOTER -->
<footer class="page-footer bg-dark fixed-bottom py-2">
    <div class="container text-center">
        © 2019 lynxproject
        <a href="#">Terms and Conditions</a>
    </div>
</footer>

<!-- REGISTER MODAL -->
@include('auth.register')
<!-- LOGIN MODAL -->
@include('auth.login')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        if(window.location.href.indexOf('#loginModal') != -1) {
            $('#loginModal').modal('show');
        }
        if(window.location.href.indexOf('#registerModal') != -1) {
            $('#registerModal').modal('show');
        }
    });
</script>
</body>
</html>
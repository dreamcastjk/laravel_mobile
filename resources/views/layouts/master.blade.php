
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{ route('home') }}">Все товары</a></li>
                <li @routeactive('categor*')><a href="{{ route('categories') }}">Категории</a></li>
                <li @routeactive('basket*')><a href="{{ route('basket') }}">В корзину</a></li>
                <li><a href="{{ route('home') }}">Сбросить проект в начальное состояние</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">Панель администратора</a></li>
                @endguest
                @auth
                    <li><a href="{{ route('index') }}">Панель администратора</a></li>
                    <li><a href="{{ route('get-logout') }}">Выйти</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="starter-template">
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @elseif (session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>

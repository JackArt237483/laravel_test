<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ToDo App')</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased">
<header>
    <h1>Welcome to the ToDo App</h1>
    @auth
        <p>Hello, {{ Auth::user()->username }}! <a href="{{ route('logout') }}">Logout</a></p>
    @endauth
    @guest
        <p><a>Login</a></p>
    @endguest
</header>

<main>
    @yield('content') <!-- Подключение динамического контента -->
</main>

<footer>
    <p>&copy; 2024 ToDo Application</p>
</footer>
</body>
</html>

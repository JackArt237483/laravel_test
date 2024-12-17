<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ToDo App')</title>
</head>
<body>
<header>
    <h1>Welcome to the ToDo App</h1>
    @auth
        <p>Hello, {{ Auth::user()->username }}! <a href="{{ route('logout') }}">Logout</a></p>
    @endauth
    @guest
        <p>фывафывафыв</p>
    @endguest
</header>

<main>
    @yield('content') <!-- Динамический контент -->
</main>

<footer>
    <p>&copy; 2024 ToDo Application</p>
</footer>
</body>
</html>


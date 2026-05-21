<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviewFlix</title>
</head>
<body>
    <header>
        <h1>ReviewFlix - @yield('title')</h1>
        <nav>
            <a href="/">Home</a> | 
            <a href="/news">News</a> | 
            <a href="/movies">Movies</a> | 
            <a href="/series">Series</a> |
            <a href="/reviews">Reviews</a> |          
            <a href="/faq">FAQ</a> |
            <a href="/contact">Contact</a>

            @auth
                <a href="/dashboard">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf

                    <button type="submit" style="background:none; border:none; cursor:pointer; text-decoration:underline;">
                        Log out
                    </button>
                    </form>
                @else
                <a href="/login">Log in</a>
                <a href="/register">Register</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 ReviewFlix. All rights reserved.</p>
    </footer>
</body>
</html>
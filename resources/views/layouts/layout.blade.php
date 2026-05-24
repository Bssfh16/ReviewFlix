<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviewFlix</title>
    <link rel="stylesheet" href="/css/reviewflix.css">
</head>
<body>
    <header>
        <h1>ReviewFlix - @yield('title')</h1>
        <nav>
            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a> | 
            <a href="/news" class="{{ request()->is('news*') ? 'active' : '' }}">News</a> | 
            <a href="/movies" class="{{ request()->is('movies*') ? 'active' : '' }}">Movies</a> | 
            <a href="/series" class="{{ request()->is('series*') ? 'active' : '' }}">Series</a> |
            <a href="/reviews" class="{{ request()->is('reviews*') ? 'active' : '' }}">Reviews</a> |          
            <a href="/faq" class="{{ request()->is('faq*') ? 'active' : '' }}">FAQ</a> |
            <a href="/contact" class="{{ request()->is('contact*') ? 'active' : '' }}">Contact</a> |

            @auth
                <a href="/profile/{{ auth()->user()->username }}">Profile</a> |
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="/dashboard">Dashboard</a> |
                @endif
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
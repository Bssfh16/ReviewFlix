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
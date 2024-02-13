<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta tags, CSS links, etc. -->
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
</head>
<body>
    <!-- Navigation menu -->
    <header>
        <!-- Your navigation menu code here -->
    </header>

    <!-- Page content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <!-- Your footer code here -->
    </footer>
</body>
</html>

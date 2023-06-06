<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <!-- Header content goes here -->
    </header>
    @include('partials.language_switcher')

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
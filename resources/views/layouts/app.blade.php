<!DOCTYPE html>
<html>
<head>
    <!-- ... -->
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

    <!-- ... -->
</body>
</html>
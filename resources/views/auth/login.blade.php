
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
    
</form>
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">Sing up</a>
</li>
</body>
</html>